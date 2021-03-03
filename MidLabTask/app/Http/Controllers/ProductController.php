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
        return view('product.existing');
    }
    public function upcoming(Request $request)
    {
        return view('product.upcoming');
    }
    public function add(Request $request)
    {
        return view('product.add');
    }
}
