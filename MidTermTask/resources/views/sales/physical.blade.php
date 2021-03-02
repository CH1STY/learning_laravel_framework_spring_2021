@extends('layout.main')

@section('title')
Physical Store
@endSection

@section('container')

<h1>Physical Store Sales</h1>
<p style="color:green;">{{session('successMsg')}}</p>
<table>
    <tr>
        <td>Today's Sales:</td>
        <td>{{$info['pToday']}} items</td>
    </tr>
    <tr>
        <td>This week Sales:</td>
        <td>{{$info['pSeven']}} items</td>
    </tr>
    <tr>
        <td>This week Sales:</td>
        <td>{{$info['pSeven']}} items</td>
    </tr>
    <tr>
        <td>Most Sold Product:</td>
        <td>{{$info['bestProduct']}}</td>
    </tr>
    <tr>
        <td>Average Sale of this month</td>
        <td>{{$info['average']}} BDT</td>
    </tr>



</table>

<a href="{{route('sales.physical.logs')}}"><button style="margin:10px">View Sales Logs</button></a><br>

@foreach ($errors->all() as $err)
        <p style="color:red">{{$err}}</p>
        @endforeach

<form action="" method="post">
@csrf
    <table>
        <tr>
                <td style="margin-right:5px;padding-right:25px;">Customer Name</td>
                <td><input type="text" name="customer_name" id="" value="{{old('customer_name')}}"></td>
        </tr>
        <tr>
                <td style="margin-right:5px;padding-right:25px;">Address</td>
                <td><input type="text" name="address" id="" value="{{old('address')}}"></td>
        </tr>
        <tr>
                <td style="margin-right:5px;padding-right:25px;">Phone</td>
                <td><input type="text" name="phone" id="" value="{{old('phone')}}"></td>
        </tr>
        <tr>
                <td style="margin-right:5px;padding-right:25px;">Product Id</td>
                <td><input type="text" name="product_id" id="" value="{{old('product_id')}}"></td>
        </tr>
        <tr>
                <td style="margin-right:5px;padding-right:25px;">Product Name</td>
                <td><input type="text" name="product_name" id="" value="{{old('product_name')}}"></td>
        </tr>
        <tr>
                <td style="margin-right:5px;padding-right:25px;">Unit Price</td>
                <td><input type="number" name="unit_price" id="" value="{{old('unit_price')}}"></td>
        </tr>
        <tr>
                <td style="margin-right:5px;padding-right:25px;">Quantity</td>
                <td><input type="number" name="quantity" id="" value="{{old('quantity')}}"></td>
        </tr>
        <tr>
                <td style="margin-right:5px;padding-right:25px;">Total Price</td>
                <td><input type="number" name="total_price" value="{{old('total_price')}}" id=""></td>
        </tr>
        <tr>
                <td style="margin-right:5px;padding-right:25px;">Payment Type</td>
                <td>
                    <select name="payment_type" id="">
                        <option value="">Select Payment Type</option>
                        <option value="cash" @if(old('payment_type')=='cash') selected @endif>Cash</option>
                        <option value="card" @if(old('payment_type')=='card') selected @endif>Card</option>
                        <option value="online" @if(old('payment_type')=='online') selected @endif>Online</option>
                    </select>
                </td>
        </tr>

    </table>
    <button type="submit">Add Sales Record</button>
</form>
    

<a href="{{route('sales')}}"><button style="margin:10px">Go Back</button></a>

@endSection

