<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Cart;
use Illuminate\support\Facades\Auth;

class CartController extends Controller
{
    //
    public function index(){
        $cartItems=Cart::instance('cart')->content();
        return view('cart',['cartItems'=>$cartItems]);
    }
    public function addToCart(Request $request){
        $product =Product::find($request->id);
        $price=$product->sale_price ? $product->sale_price : $product->regular_price;
        Cart::instance('cart')->add($product->id,$product->name,$request->quantity,$price)->associate('App\Models\Product');
        return redirect()->back()->with('message','Success ! Item has been added successfully!');
    }

    public  function updateCart(Request $request){
        Cart::instance('cart')->update($request->rowId,$request->quantity);
        return redirect()->route('cart.index');
    }

    public function removeItem(Request $request){
        $rowId= $request->rowId;
        Cart::instance('cart')->remove($rowId);
        return redirect()->route('cart.index');

    }
    public function clearCart(){

        Cart::instance('cart')->destroy();
        return redirect()->route('cart.index');

    }
    public function checkout(){
        if(Auth::check()){
            return rediect()->route('checkout');
        }
        else{
            
            return rediect()->route('login');
        }
    }

    public function setAmountForCheckout(){
        if(session()->has('coupon')){

            session()->put('checkout',[
                'discount'=>$this->discount,
                'subtotal'=>$this->subtotalAfterDiscount,
                'tax'=>$this->taxAfterDiscount,
                'total'=>$this->totalAfterDiscount
            ]);
          
    }
    else{

        session()->put('checkout',[
            'discount'=>0,
            'subtotal'=>Cart::instance('cart')->subtotal(),
            'tax'=>Cart::instance('cart')->tax(),
            'total'=>Cart::instance('cart')->total(),
        ]);
    }

}

public function render(){
    if(session()->has('coupon')){
        if(Cart::instance('cart')->subtotal()< session()->get('coupon')['cart_value']){
            session()->forget('coupon');
        }
        else{
            $this->calculateDiscount();
        }
    }
    $this->setAmountForCheckout();
    return redirect()->route('shop.index');
}

}