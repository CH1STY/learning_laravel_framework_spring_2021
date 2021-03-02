@extends('layout.main')

@section('title')
Accountant Dashboard
@endSection

@section('container')
<h1>Account Dashboard</h1>
<h1>Welcome User {{session('username')}}</h1>
<a href="{{route('logout')}}"><button >Logout</button></a>


@endSection

