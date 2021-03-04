<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Http\Requests\ProductEditRequest;

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
        $products = $products->where('status','existing');
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
    public function existingEdit(Request $request,$id)
    { 
        $product = Product::find($id);

        if(isset($product))
        {   
            $msg ="";
            return view('product.existingEdit',compact('msg','id','product'));
        }
        else
        {
            
            return view('product.existingEdit')->with('msg','Product ID ERROR')->with('id',$id);
        }

    }

    public function existingEditUpdate(ProductEditRequest $request,$id)
    { 

        $product = Product::find($id);

        if($product)
        {
            $product->product_name = $request->product_name;
            $product->category = $request->category;
            $product->unit_price = $request->unit_price;
            $product->status = $request->status;
            if($product->save())
            {
                $msg = "Product Updated Successfully!, Product ID Updated : ".$id;
                $request->session()->flash('productUpdateMsgSucc',$msg);
            }
            else
            {

                $request->session()->flash('productUpdateMsgFail','Product Updated Failed');
            }

        }
        else
        {
            $request->session()->flash('productUpdateMsgFail','Product Updated Failed');
            
        }
        return redirect()->route('product.existing.edit',['id'=>$id]);

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
