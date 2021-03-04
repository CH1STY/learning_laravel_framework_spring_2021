@extends('layout.main')


@section('title')
Existing Products
@endSection

@section('container')



<script>
     function check(){
        if(confirm("Are You Sure You want's to delete this product?"))
        {
            return true;
        }
        else
        {
            return false;
        }
      }
</script>


<h1>Existing Product List</h1>
<br>


<a style="margin-right:30px;" href="{{route('product.existing')}}">Existing Product</a>
<a style="margin-right:30px;" href="{{route('product.upcoming')}}">Upcoming Product</a>
<a style="margin-right:30px;" href="{{route('product.adding')}}">Add Product</a>
<br>

<h3 style="margin:3%;">Existing Product Table</h3>
<p style="color:green">{{session('deleteMsg')}}</p>

@if(request('sort'))
    <p>Sort Filter: <a href="{{route('product.existing',['sort' => request('sort'),'sortType'=>'asc'])}}">Ascending</a> |
    <a href="{{route('product.existing',['sort' => request('sort'), 'sortType'=>'desc'])}}">Descending</a></p>
   
@endif


<table border="2px solid black" name="product_table"> 

    <thead>
        <th><a href="{{route('product.existing',['sort'=>'id', 'sortType' => request('sortType')])}}"> Product ID</a> </th>
        <th><a href="{{route('product.existing',['sort'=>'product_name', 'sortType' => request('sortType')])}}"> Product Name </a> </th>
        <th><a href="{{route('product.existing',['sort'=>'category', 'sortType' => request('sortType')])}}">Category </a> </th>
        <th><a href="{{route('product.existing',['sort'=>'unit_price', 'sortType' => request('sortType')])}}">Unit Price </a> </th>
        <th><a href="{{route('product.existing',['sort'=>'quantity', 'sortType' => request('sortType')])}}">Quantity </a> </th>
        <th><a href="{{route('product.existing',['sort'=>'date_added', 'sortType' => request('sortType')])}}">Date Added(Y-m-d) </a> </th>
        <th style="text-align:center" colspan="3">Action</th>
       
    </thead>
    <tbody>
    @foreach ($products as $product)
        <tr>
            <td>{{$product->id}}</td>
            <td>{{$product->product_name}}</td>
            <td>{{$product->category}}</td>
            <td>{{$product->unit_price}}</td>
            <td>{{$product->quantity}}</td>
            <td>{{substr($product->date_added,0,10)}}</td>
            <td><a href="{{route('product.existing.edit',['id'=> $product->id])}}"><button style="margin:5px;padding:5px" >Edit</button></a></td>
            <td><a onclick="return check()" class='delete' href="{{route('product.existing.delete',['id'=> $product->id])}}"><button style="margin:5px;padding:5px" >Delete</button></a></td>
            <td><a href="{{route('product.existing.details',['product_id'=> $product->id,'vendor_id'=> $product->vendor_id])}}"><button style="margin:5px;padding:5px" >View Details</button></a></td>
            
        </tr>
    @endforeach
    </tbody>


</table><br>
    <div style="display:flex; justify-content:center;">
        {{$products->links()}}
    </div>



<a href="{{route('product')}}"><button style="margin-top:5%;margin-bottom:5px;" >Go BACK</button></a><br>
<a href="{{route('logout')}}"><button >Logout</button></a>




@endSection

