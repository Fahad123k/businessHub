<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    //index page of shop
    public function index(){
        return view('shop');
    }
}
