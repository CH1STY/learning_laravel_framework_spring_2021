@extends('layout.main')


@section('title')

Sales Channel

@endSection

@section('container')
<h1>Sales Channel</h1>

<fieldset>
    <legend><a href="{{route('sales.physical')}}">Physical Store</a> </legend>

    <table border="1px solid black">
        <thead>
            <th>
                Today Sales Count
            </th>
            <th>
                Last 7 Day Sales Count
            </th>
        </thead>
        <tbody>
            <td>{{$info['pToday']}}</td>
            <td>{{$info['pSeven']}}</td>
        </tbody>
    
    </table>
</fieldset>
<fieldset>
    <legend><a href="{{route('sales.social')}}">Social Media</a> </legend>

    <table  border="1px solid black">
        <thead>
            <th>
                Today Sales Count
            </th>
            <th>
                Last 7 Day Sales Count
            </th>
        </thead>
        <tbody>
            <td>{{$info['sToday']}}</td>
            <td>{{$info['sSeven']}}</td>
        </tbody>
    
    </table>
</fieldset>
<fieldset>
    <legend><a href="{{route('sales.ecommerce')}}">Ecommerce Store</a> </legend>

    <table  border="1px solid black">
        <thead>
            <th>
                Today Sales Count
            </th>
            <th>
                Last 7 Day Sales Count
            </th>
        </thead>
        <tbody>
            <td>{{$info['eToday']}}</td>
            <td>{{$info['eSeven']}}</td>
        </tbody>
    
    </table>
</fieldset>

<a href="{{route('root')}}"><button style="margin:10px">Go Back</button></a>

@endSection