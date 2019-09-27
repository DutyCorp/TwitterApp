<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
	<div class="login">
		<form action="/doLogin" method="post">
			@csrf
			<h1>Login</h1>

			<label for="LoginUsername">Username</label>
			<input type="text" id="LoginUsername" name="LoginUsername"></input><br>

			<label for="LoginPassword">Password</label>
			<input type="password" id="LoginPassword" name="LoginPassword"></input><br>
			<button id="btnLogin" type="submit">Login</button>
		</form><br><br>
	</div>

	<div class="login">
		<form action="/doRegister" method="post">
			@csrf
			<h1>Register</h1>
			<label for="RegisterUsername">Username</label>
			<input type="text" id="RegisterUsername" name="RegisterUsername"></input><br>

			<label for="RegisterPassword">Password</label>
			<input type="password" id="RegisterPassword" name="RegisterPassword"></input><br>

			<label for="RegisterEmail">Email</label>
			<input id="RegisterEmail" type="email" name="RegisterEmail"></input><br>
			<button id="btnRegister" type="submit">Register</button>
		</form>
	</div>
</body>
</html>