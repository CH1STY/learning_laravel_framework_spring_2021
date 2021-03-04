<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Vendor;
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
        $product = Product::where('id',$id)
                    ->where('status','existing')            
                    ->first();

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
                return redirect()->route('product.existing');
            }
            else
            {

                $request->session()->flash('productUpdateMsgFail','Product Updated Failed');
                return redirect()->route('product.existing.edit',['id'=>$id]);
            }

        }
        else
        {
            $request->session()->flash('productUpdateMsgFail','Product Updated Failed');
            return redirect()->route('product.existing.edit',['id'=>$id]);
            
        }

    }

    

    public function existingDelete(Request $request,$id)
    { 
        $product = Product::find($id);
        if($product)
        {

            $request->session()->flash('deleteMsg','Product Deleted "'.$product->product_name.'" ProductId: '.$product->id.' ');
            $product->delete();
        }
        else
        {
            $request->session()->flash('deleteMsg','Product Deletion Failed Maybe It does not exist anymore');

        }

        return redirect()->route('product.existing');
    }

    public function existingDetails(Request $request,$product_id,$vendor_id)
    {   
        return view('product.existingDetails',compact('product_id','vendor_id'));
    }
    public function upcoming(Request $request)
    {   
        $products = new Product;
        $products = $products->where('status','upcoming');
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

        return view('product.upcoming')->with('products',$products);
    }
    
    public function upcomingDelete(Request $request,$id)
    { 
        $product = Product::find($id);
        if($product)
        {

            $request->session()->flash('deleteMsg','Product Deleted "'.$product->product_name.'" ProductId: '.$product->id.' ');
            $product->delete();
        }
        else
        {
            $request->session()->flash('deleteMsg','Product Deletion Failed Maybe It does not exist anymore');

        }

        return redirect()->route('product.upcoming');
    }


    public function upcomingEdit(Request $request,$id)
    { 
        $product = Product::where('id',$id)
                    ->where('status','upcoming')            
                    ->first();

        if(isset($product))
        {   
            $msg ="";
            return view('product.upcomingEdit',compact('msg','id','product'));
        }
        else
        {
            
            return view('product.upcomingEdit')->with('msg','Product ID ERROR')->with('id',$id);
        }
    }

    public function upcomingEditUpdate(ProductEditRequest $request,$id)
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
                return redirect()->route('product.upcoming');
            }
            else
            {

                $request->session()->flash('productUpdateMsgFail','Product Updated Failed');
                return redirect()->route('product.upcoming.edit',['id'=>$id]);
            }

        }
        else
        {
            $request->session()->flash('productUpdateMsgFail','Product Updated Failed');
            return redirect()->route('product.upcoming.edit',['id'=>$id]);
            
        }

    }


    public function productDetails(Request $request,$product_id,$vendor_id)
    { 
        $product = Product::where('id',$product_id)
                    ->where('vendor_id',$vendor_id)            
                    ->first();

        $vendor = Vendor::find($vendor_id);

        if(isset($product) && isset($vendor))
        {   
            $msg ="";
            return view('product.productDetails',compact('msg','vendor_id','product_id','product','vendor'));
        }
        else
        {
            
            return view('product.productDetails')->with('msg','Product or Vendor ID ERROR <br> Invalid Request')->with('$product_id',$product_id)->with('vendor_id',$vendor_id);
        }
    }

    public function add(Request $request)
    {
        return view('product.add');
    }
}
