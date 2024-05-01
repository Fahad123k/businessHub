<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
class ShopController extends Controller
{
    //index page of shop
    public function index(Request $request){
        $page=$request->query('page');
        $size=$request->query('size');
        $order=$request->query('order');
        if(!$page)
            $page=1;
        if(!$size)
            $size=12;
        if(!$order)
            $order=-1;
        $o_column="";
        $o_order="";

        switch ($order) {
            case 1:
                $o_column="created_at";
                $o_order="DESC";
                break;
            case 2:
                $o_column="created_at";
                $o_order="ASC";
                break;
            case 3:
                $o_column="regular_price";
                $o_order="ASC";
                break;
            case 4:
                $o_column="regular_price";
                $o_order="DESC";
                break;
            
            default:
                $o_column="id";
                $o_order="DESC";
                break;
        }

        $brands= Brand::orderBy('name','ASC')->get();
        // check box filter for brand
        $q_brands=$request->query('brands');

        $categories= Category::orderBy('name','ASC')->get();
        $q_categories=$request->query('categories');
        $products=Product::where(function($query) use($q_brands){
            // if q brands is exist then where clause other wise q_brands will be empty like q_brand=
            $query->whereIn('brand_id',explode(',',$q_brands))->orwhereRaw("'".$q_brands."'=''");
        })
        ->where(function($query) use($q_categories){
            // if q brands is exist then where clause other wise q_brands will be empty like q_brand=
            $query->whereIn('category_id',explode(',',$q_categories))->orwhereRaw("'".$q_categories."'=''");
        } )
        ->orderBy('created_at','DESC')->orderBy($o_column, $o_order)->paginate($size);
      

        return view('shop',
        [
            'products'=>$products,
            'page'=>$page,
            'size'=>$size,
            'order'=>$order,
            'brands'=>$brands,
            'q_brands'=>$q_brands,
            'q_categories'=>$q_categories,
            'categories'=>$categories,
        ]);

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