@extends('layout.main')


@section('title')
Upcoming Product Edit
@endSection

@section('container')

<h1>Product Edit (Upcoming)</h1>


<p style="color:red">{{$msg}}</p>

@if($msg) @else

<br>
<a style="margin-right:30px;" href="{{route('product.existing')}}">Existing Product</a>
<a style="margin-right:30px;" href="{{route('product.upcoming')}}">Upcoming Product</a>
<a style="margin-right:30px;" href="{{route('product.adding')}}">Add Product</a>
<br>

<p style="color:green">Editing Product with Product ID: {{$id}} </p>
@foreach ($errors->all() as $err)
        <p style="color:red">{{$err}}</p>
        @endforeach
<!--Form TABLE -->

@if(session('productUpdateMsgSucc'))
    <p style="color:green">{{session('productUpdateMsgSucc')}}</p>
@endif
@if(session('productUpdateMsgFail'))
    <p style="color:red">{{session('productUpdateMsgFail')}}</p>
@endif

<form action="" method="post">
@csrf
    <table style="margin-top:3%">
        <tr>
            <td>Product Name</td>
            <td><input type="text" name="product_name" id="" value="{{$product->product_name}}"></td>
        </tr>
        <tr>
            <td>Category</td>
            <td>
                <select name="category" id="">
                    <option value="" selected>Select A Category</option>
                    <option value="Liquid" @if ($product->category=='Liquid') selected @endif>Liquid</option>
                    <option value="Vegetable" @if ($product->category=='Vegetable') selected @endif>Vegetable</option>
                    <option value="Meat" @if ($product->category=='Meat') selected @endif>Meat</option>
                    <option value="Makeup" @if ($product->category=='Makeup') selected @endif>Makeup</option>
                    <option value="Grocery" @if ($product->category=='Grocery') selected @endif>Grocery</option>
                </select>

            </td>
        </tr>
        <tr>
            <td>Unit Price</td>
            <td><input type="number" name="unit_price" id="" value="{{$product->unit_price}}"></td>
        </tr>
        <tr>
            <td>Status</td>
            <td>
                <select name="status" id="">
                    <option value="" selected>Select Status</option>
                    <option value="existing" @if ($product->status=='existing') selected @endif>Existing</option>
                    <option value="upcoming" @if ($product->status=='upcoming') selected @endif>Upcoming</option>
                </select>
            </td>
        </tr>

    </table>

    <button type="submit">Update Product Info</button>

</form>


<!------------------------------------->
@endif

<a href="{{route('product.upcoming')}}"><button style="margin-top:5%;margin-bottom:5px;" >Go BACK</button></a><br>

<a href="{{route('logout')}}"><button >Logout</button></a>


@endSection

