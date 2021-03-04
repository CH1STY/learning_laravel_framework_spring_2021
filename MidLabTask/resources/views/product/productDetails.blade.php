@extends('layout.main')


@section('title')
Product Details
@endSection

@section('container')

<script>
function backBtn() {
  window.history.back();
}
</script>

<h1>Product Details</h1>



<p style="color:red">{!! nl2br($msg) !!}</p>

@if($msg) @else

<br>
<a style="margin-right:30px;" href="{{route('product.existing')}}">Existing Product</a>
<a style="margin-right:30px;" href="{{route('product.upcoming')}}">Upcoming Product</a>
<a style="margin-right:30px;" href="{{route('product.adding')}}">Add Product</a>
<br>

<p style="color:green">Viewing Details of Product with ID: {{$product_id}} and <br> Vendor ID: {{$vendor_id}} </p>
<h1>Information Table</h1>
<table width="70%" style="text-align:center;" class="detailsTable">
    <tr style="font-size:20px;">
        <td align="right" style="padding-right:20%" width="50%">Product Name:</td>
        <td align="left" style="padding-left:20%" width="50%"><b>{{$product->product_name}}<b></td>
    </tr>
    <tr>
        <td align="right"  style="padding-right:20%" width="50%">Category:</td>
        <td align="left" style="padding-left:20%"  width="50%"><b>{{$product->category}}<b></td>
    </tr>
    <tr>
        <td align="right"  style="padding-right:20%" width="25%">Price:</td>
        <td align="left" style="padding-left:20%" width="25%"><b>${{$product->unit_price}}<b></td>
    </tr>
    <tr>
        <td align="right"  style="padding-right:20%" width="25%">Quantity:</td>
        <td align="left" style="padding-left:20%" width="25%"><b>{{$product->quantity}}<b></td>
    </tr>
    <tr>
        <td align="right"  style="padding-right:20%" width="25%">Status:</td>
        <td align="left" style="padding-left:20%" width="25%"><b style="text-transform:capitalize;">{{$product->status}}<b></td>
    </tr>
    <tr>
        <td align="right"  style="padding-right:20%" width="25%">Vendor Name</td>
        <td align="left" style="padding-left:20%" width="25%"><b>{{$vendor->full_name}}<b></td>
    </tr>
    <tr>
        <td align="right"  style="padding-right:20%" width="25%">Vendor Country:</td>
        <td align="left" style="padding-left:20%" width="25%"><b>{{$vendor->country}}<b></td>
    </tr>
    <tr>
        <td align="right"  style="padding-right:20%" width="25%">Vendor Company:</td>
        <td align="left" style="padding-left:20%" width="25%"><b>{{$vendor->company_name}}<b></td>
    </tr>
    <tr>
        <td align="right"  style="padding-right:20%" width="25%">Vendor Status:</td>
        <td align="left" style="padding-left:20%" width="25%"><b  style="text-transform:capitalize; color:@if($vendor->usertype=='active')green @else red @endif ; " >{{$vendor->usertype}}<b></td>
    </tr>
    <tr>
        <td align="right"  style="padding-right:20%" width="25%">Date Added:</td>
        <td align="left" style="padding-left:20%" width="25%"><b>{{date('j F, Y', strtotime($product->date_added)) }}<b></td>
    </tr>
    

</table>

@endif

<button onclick="backBtn()" style="margin-top:5%;margin-bottom:5px;" >Go BACK</button><br>

<a href="{{route('logout')}}"><button >Logout</button></a>



@endSection

