<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
class ShopController extends Controller
{
    //index page of shop
    public function index(Request $request){
        $page=$request->query('page');
        $size=$request->query('size');
        if(!$page)
            $page=1;
        if(!$size)
            $size=12;


        $products=Product::paginate($size);
      
        return view('shop',['products'=>$products,'page'=>$page,'size'=>$size]);
        }

    public function productDetails($slug){
        $product= Product::where('slug',$slug)->first();
        $related_products = Product::where('slug', '!=', $slug)
        ->inRandomOrder()
        ->take(8)
        ->get();

        return view('details',['product'=>$product,'related_products'=>$related_products]);
    }
}