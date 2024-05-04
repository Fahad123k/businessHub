<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Cart;

class WishlistController extends Controller
{
    //
    public function addProductToWishList(Request $request){
        Cart::instance('wishlist')->add($request->id,$request->name,1,$request->price)->associate('App\Models\Product');
        return response()->json(['status'=>200,"message"=>"Success! item successfully added to your wishlist"]);
    }

    public function getWishlistedProducts()
{
    $items = Cart::instance("wishlist")->content();
    return view('wishlist',['items'=>$items]);
}
}