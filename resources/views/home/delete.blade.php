<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Deletion</title>
</head>
<body>
    <form action="" method="post">
        @csrf
        <h3>Are you sure you wants to delete user with ID: {{$user->id}} ?</h3>
        <button type="submit" name="input" value="delete">Yes</button>
        <button type="submit" name="input" value="back">Go Back</button>
        <h4>User Details</h4>
        <table>
        <tr>
            <td>Username:</td>
            <td style="font-weight:bold;">{{$user->username}}</td>
        </tr>
        <tr>
            <td>Email:</td>
            <td style="font-weight:bold;">{{$user->email}}</td>
        </tr>
        <tr>
            <td>User Type:</td>
            <td style="font-weight:bold;">{{$user->userType}}</td>
        </tr>
        </table>
    
    </form>
</body>
</html>