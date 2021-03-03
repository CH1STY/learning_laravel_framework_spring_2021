@extends('layout.main')


@section('title')
Existing Products
@endSection

@section('container')

<h1>Existing Product List</h1>
<br>


<a style="margin-right:30px;" href="{{route('product.existing')}}">Existing Product</a>
<a style="margin-right:30px;" href="{{route('product.upcoming')}}">Upcoming Product</a>
<a style="margin-right:30px;" href="{{route('product.adding')}}">Add Product</a>
<br>

<h3 style="margin:3%;">Existing Product Table</h3>

<table border="2px solid black" name="product_table"> 

    <thead>
        <th>Product Name</th>
        <th>Category</th>
        <th>Unit Price</th>
        <th>Action</th>
    </thead>
    <tbody>
    @foreach ($products as $product)
        <tr>
            <td>{{$product->product_name}}</td>
            <td>{{$product->category}}</td>
            <td>{{$product->unit_price}}</td>
            <td><a href="{{route('product.existing.edit',['id'=> $product->id])}}"><button style="margin:5px;padding:5px" >Edit</button></a></td>
            
        </tr>
    @endforeach
    </tbody>


</table>


<a href="{{route('product')}}"><button style="margin-top:5%;margin-bottom:5px;" >Go BACK</button></a><br>
<a href="{{route('logout')}}"><button >Logout</button></a>

@endSection

