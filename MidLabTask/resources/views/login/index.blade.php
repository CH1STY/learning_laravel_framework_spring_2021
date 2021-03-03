<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/app.css">
    <title>CMS LOGIN</title>
</head>
<body>
<div align="center" style="width:100%;padding-top:40px;">
<h1>CMS</h1>
    <form action="" method="post">
    @csrf
    <p style=>Email</p>
    <input type="email" name="email" value="{{old('email')}}" id=""><br>
    <p style="margin-top:40px">Password</p>
    <input type="password" name="password" id=""><br>

    @foreach ($errors->all() as $err)
    <p style="color:red">{{$err}}</p>
    @endforeach
    <p style="color:red">{{session('errorMsg')}}</p>
    <p style="color:green">{{session('successMsg')}}</p>


    <button style="margin-top:50px" type="submit">Login</button>
    </form>

    <a href="{{route('register')}}"><h4>To Register Click Here!</h4></a>
    <a href="{{route('sales')}}"><p>Sales Channel</p></a>
    

</div>
</body>
</html>