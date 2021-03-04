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

        $products = new Product;
        $hasSort = false;

        if($request->has('sortType'))
        {
            $sortType = $request->sortType;
        }
        else
        {
            $sortType = "asc";
        }

        if($request->has('sort'))
        {
           $hasSort = true;
           $products = $products->orderBy($request->sort,$sortType);
        }

        if($hasSort)
        {  
            $products = $products->paginate(20)->appends([
                'sort' => $request->sort,
                'sortType' => $sortType,
            ]);    
        }
        else
        {
            $products = $products->paginate(20);    
        }

        return view('product.existing')->with('products',$products);
    }
    public function existingEdit(Request $request)
    { 

        return view('product.existingEdit');
    }
    public function existingDelete(Request $request,$id)
    { 
        $product = Product::find($id);

        $product->delete();

        $request->session()->flash('deleteMsg','Product Deleted "'.$product->product_name.'" ProductId: '.$product->id.' ');
        return redirect()->route('product.existing');
    }

    public function existingDetails(Request $request,$product_id,$vendor_id)
    {   
        return view('product.existingDetails',compact('product_id','vendor_id'));
    }
    public function upcoming(Request $request)
    {   
        $products = Product::where('status','upcoming')
                            ->paginate(20);

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
