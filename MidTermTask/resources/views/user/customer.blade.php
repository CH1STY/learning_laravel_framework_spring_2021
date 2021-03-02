@extends('layout.main')


@section('title')
Customer Dashboard
@endSection

@section('container')
<h1>Customer Dashboard</h1>
<h1>Welcome User {{session('username')}}</h1>
<a href="{{route('logout')}}"><button >Logout</button></a>


@endSection

