<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>@yield('title')</title>
</head>
<body>
<div align="center" style="width:100%">

<p style="color:red;margin-top:5%; @if(session('userPermissionError')) display:block;@else display:none @endif   "> {{session('userPermissionError')}}</p>

@yield('container')


</div>
    
</body>
</html>