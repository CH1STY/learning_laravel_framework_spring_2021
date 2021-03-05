@extends('layout.main')


@section('title')
Add Product
@endSection

@section('container')

<h1>Product Adding</h1>
<br>

<a style="margin-right:30px;" href="{{route('product.existing')}}">Existing Product</a>
<a style="margin-right:30px;" href="{{route('product.upcoming')}}">Upcoming Product</a>
<a style="margin-right:30px;" href="{{route('product.adding')}}">Add Product</a>
<br>

<p style="color:green">{{session('successMsg')}}</p>
<p style="color:red">{{session('failMsg')}}</p>

<h1 style="margin:2%;">Adding New Product</h1>

<form action="" method="post">
@csrf 
    <table style="text-align:right;">
        <tr>
            <td>Product Name:</td>
            <td style="padding-left:4%;"><input type="text" name="product_name" value="{{old('product_name')}}" id=""></td>
        </tr>
        <tr>
            <td>Category:</td>
            <td  align="left" style="padding-left:4%;">
                <select name="category" id="">
                    <option value="" selected>Select A Category</option>
                    <option value="Liquid" @if (old('category')=='Liquid') selected @endif>Liquid</option>
                    <option value="Vegetable" @if (old('category')=='Vegetable') selected @endif>Vegetable</option>
                    <option value="Meat" @if (old('category')=='Meat') selected @endif>Meat</option>
                    <option value="Makeup" @if (old('category')=='Makeup') selected @endif>Makeup</option>
                    <option value="Grocery" @if (old('category')=='Grocery') selected @endif>Grocery</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Unit Price:</td>
            <td style="padding-left:4%;"><input type="number" name="unit_price" id=""></td>
        </tr>
        <tr>
            <td>Vendor Name:</td>
            <td style="padding-left:4%;"  align="left">
                <select name="vendor_id" id="">
                    <option value="" selected>Select a vendor name</option>
                    @foreach($vendors as $vendor)
                    <option value="{{$vendor->id}}" @if($vendor->id == old('vendor_id')) selected @endif> {{$vendor->full_name}} </option>
                    @endforeach
                </select>
            </td>
        </tr>

        <tr>
        <td>Status:</td>
            <td style="padding-left:4%;" align="left">
                <select  name="status" id="">
                    <option value="" selected>Select Status</option>
                    <option value="existing" @if (old('status')=='existing') selected @endif>Existing</option>
                    <option value="upcoming" @if (old('status')=='upcoming') selected @endif>Upcoming</option>
                </select>
            </td>
        </tr>

        

    </table>
    @foreach ($errors->all() as $err)
    <p style="color:red">{{$err}}</p>
    @endforeach


    <br>
    <button type="submit">Add Product</button><br>
</form>

<a href="{{route('product')}}"><button style="margin-top:5%;" >Go BACK</button></a><br>
<a href="{{route('logout')}}"><button >Logout</button></a>


@endSection

