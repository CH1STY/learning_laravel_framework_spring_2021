<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View User List</title>
</head>
<body>

    <h1>User list</h1>
    <a href="/home">Back</a> |
    <a href="/logout">logout</a>

    <br>

    <table border="1">
        <tr>
            <td>ID</td>
            <td>NAME</td>
            <td>EMAIL</td>
            <td>Action</td>
        </tr>

        @foreach($list as $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->username }}</td>
            <td>{{ $value->email }}</td>
            <td>
                <a href="/home/edit/{{ $value->id }}">Edit</a> |
                <a href="/home/delete/{{ $value->id }}">Delete</a>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>
