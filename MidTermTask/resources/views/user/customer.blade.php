@extends('user.dashboard')

@section('title')
Customer Dashboard
@endSection

@section('container')

<h1>Welcome User {{session('username')}}</h1>
<a href="{{route('logout')}}"><button >Logout</button></a>


@endSection

