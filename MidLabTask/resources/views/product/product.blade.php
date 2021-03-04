@extends('layout.main')


@section('title')
Product Management
@endSection

@section('container')

<h1>Product Management</h1>
<br>


<a style="margin-right:30px;" href="{{route('product.existing')}}">Existing Product</a>
<a style="margin-right:30px;" href="{{route('product.upcoming')}}">Upcoming Product</a>
<a style="margin-right:30px;" href="{{route('product.adding')}}">Add Product</a>
<br>


<a href="{{route('dashboard')}}"><button style="margin-top:5%;margin-bottom:2%;" >Go Back</button></a><br>
<a href="{{route('logout')}}"><button >Logout</button></a>


@endSection

