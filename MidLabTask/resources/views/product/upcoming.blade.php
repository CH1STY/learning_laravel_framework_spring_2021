@extends('layout.main')


@section('title')
Upcoming Product 
@endSection

@section('container')

<h1>Upcoming Product List</h1>
<br>

<a style="margin-right:30px;" href="{{route('product.existing')}}">Existing Product</a>
<a style="margin-right:30px;" href="{{route('product.upcoming')}}">Upcoming Product</a>
<a style="margin-right:30px;" href="{{route('product.adding')}}">Add Product</a>
<br>


<a href="{{route('product')}}"><button style="margin-top:5%;" >Go BACK</button></a><br>
<a href="{{route('logout')}}"><button >Logout</button></a>


@endSection

