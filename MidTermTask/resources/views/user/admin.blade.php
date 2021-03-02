@extends('layout.main')


@section('title')
Admin Dashboard
@endSection

@section('container')

<h1>Admin Dashboard</h1>
<h1>Welcome User {{session('username')}}</h1>
<a href="{{route('logout')}}"><button >Logout</button></a>


@endSection

