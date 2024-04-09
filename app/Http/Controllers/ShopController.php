<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
class ShopController extends Controller
{
    //index page of shop
    public function index(){
        $products=Product::orderBy('created_at','DESC')->paginate(12);
      
        return view('shop',['products'=>$products]);
    }
    public function productDetails($slug){
        $product= Product::where('slug',$slug)->first();
        return view('details',['product'=>$product]);
    }
}
