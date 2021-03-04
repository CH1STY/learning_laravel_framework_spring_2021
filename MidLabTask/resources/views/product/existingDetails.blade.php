@extends('layout.main')


@section('title')
Existing Product Details
@endSection

@section('container')

<h1>Product Details (Existing)</h1>
<p>Product ID: {{$product_id}}, Vendor ID: {{$vendor_id}}</p>
<br>
<a style="margin-right:30px;" href="{{route('product.existing')}}">Existing Product</a>
<a style="margin-right:30px;" href="{{route('product.upcoming')}}">Upcoming Product</a>
<a style="margin-right:30px;" href="{{route('product.adding')}}">Add Product</a>
<br>

<a href="{{route('product')}}"><button style="margin-top:5%;margin-bottom:5px;" >Go BACK</button></a><br>
<a href="{{route('logout')}}"><button >Logout</button></a>


@endSection

