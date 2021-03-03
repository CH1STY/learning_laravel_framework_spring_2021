@extends('layout.main')


@section('title')
Admin Dashboard
@endSection

@section('container')

<h1>Admin Dashboard</h1>
<h1>Welcome User {{session('username')}}</h1>
<br>
<a href="{{route('sales')}}"><h4>Sales Channel</h4></a>
<a href="{{route('product')}}"><h4>Product Management</h4></a>
<a href="{{route('logout')}}"><button >Logout</button></a>


@endSection

