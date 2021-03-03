@extends('layout.main')

@section('title')
Physical Store Logs
@endSection

@section('container')

<h1>Physical Store Sales Logs</h1>

<a href="{{route('sales.physical.logs.download.sold')}}"><button style="margin:10px">Download This Months Report(SOLD)</button></a><br>
<a href="{{route('sales.physical.logs.download.pending')}}"><button style="margin:10px">Download Pending Reports</button></a><br>
<a href="{{route('sales.physical')}}"><button style="margin:10px">Go Back</button></a>

<form action="" method="post" enctype="multipart/form-data">
@csrf

<h1>File Upload Section</h1>

<input type="file" name="file" id="">
<button class="btn-lg" type="submit">Submit</button>
</form>
<br>
@foreach ($errors->all() as $err)
        <p style="color:red">{{$err}}</p>
@endforeach


@endSection

