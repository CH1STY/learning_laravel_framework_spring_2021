<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <title>Registration Page</title>
</head>
<body>
<div align="center" style="width:100%;">

    @foreach ($errors->all() as $err)
        <p style="color:red">{{$err}}</p>
        @endforeach
    <form action="" method="post">
    @csrf
        <h1>Registration Page</h1>
        <table>

            <tr>
                <td> <label for="">Full Name</label> </td>
                <td> <input class="" type="text" name="full_name" id="" value="{{old('full_name')}}" ><br></td>  
            </tr>
            <tr>
                <td><label for="">Username</label></td>
                <td><input class="" type="text" name="username" id="" value="{{old('username')}}"><br></td>    
            </tr>
            <tr>
                <td><label for="">Email</label></td>
                <td><input class="" type="text" name="email" id="" value="{{old('email')}}"><br></td>
            </tr>
            <tr> 
                <td><label for="">Password</label></td>
                <td><input class="" type="password" name="password" id=""><br></td>
            </tr>

            <tr>
                <td><label for="">Confirm Password</label></td>
                <td><input class="" type="password" name="password_confirmation" id=""><br></td>
            </tr>

            <tr>
                <td><label for="">Phone</label></td>
                <td><input class="" type="text" name="phone" value="{{old('phone')}}" id=""><br></td>
            </tr>

            <tr>
                <td><label for="">City</label></td>
                <td><input class="" type="text" name="city" value="{{old('city')}}" id=""><br></td>
            </tr>

            <tr>
                <td><label for="">Country</label></td>
                <td><input class="" type="text" name="country"  value="{{old('country')}}" id=""><br></td>
            </tr>
            <tr>
                <td><label for="">Company Name</label></td>
                <td><input class="" type="text" name="companyName" value="{{old('companyName')}}" id=""><br></td>
            </tr>
        </table>

        <button class="login-button" style="margin:30px" type="submit">REGISTER</button>

       
    
    
    </form>
    <a href="{{route('root')}}"><button style="margin:10px">Go Back</button></a>
</div>
    
</body>
</html>