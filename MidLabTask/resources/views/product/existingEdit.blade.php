@extends('layout.main')


@section('title')
Existing Product Edit
@endSection

@section('container')

<h1>Product Edit (Existing)</h1>
<br>
<a style="margin-right:30px;" href="{{route('product.existing')}}">Existing Product</a>
<a style="margin-right:30px;" href="{{route('product.upcoming')}}">Upcoming Product</a>
<a style="margin-right:30px;" href="{{route('product.adding')}}">Add Product</a>
<br>

<a href="{{route('logout')}}"><button style="margin-top:5%;" >Logout</button></a>


@endSection

