<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    //
    public function index(Request $request)
    {
        return view('product.product');
    }
    public function existing(Request $request)
    {

        $products = Product::where('status','existing')
                            ->get();

        return view('product.existing')->with('products',$products);
    }
    public function existingEdit(Request $request)
    { 

        return view('product.existingEdit');
    }
    public function upcoming(Request $request)
    {   
        $products = Product::where('status','upcoming')
                            ->get();

        return view('product.upcoming')->with('products',$products);
    }
    public function upcomingEdit(Request $request)
    { 

        return view('product.upcomingEdit');
    }
    public function add(Request $request)
    {
        return view('product.add');
    }
}
