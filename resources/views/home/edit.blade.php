<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit User</title>
</head>
<body>
    <h1>Edit User, {{ $user['id']}}</h1>

    <form method="post">
	@csrf
		<fieldset>
			<legend>Edit</legend>
			<table>
				<tr>
					<td>Username</td>
					<td><input type="text" name="username" value="{{ $user['name'] }}"></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input type="password" name="password" value="{{ $user['password'] }}"></td>
				</tr>
                <tr>
					<td>Email</td>
					<td><input type="text" name="email" value="{{ $user['email'] }}"></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="submit" value="update"></td>
				</tr>
			</table>
		</fieldset>
	</form>
</body>
</html>
