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

			<label for="Username">Username</label>
			<input type="text" id="Username"></input>

			<label for="password">Password</label>
			<input type="password" id="Password"></input>
			<button id="btnLogin" type="submit">Login</button>
		</form><br><br>
	</div>

	<div class="login">
		<form action="/doRegister" method="post">
			@csrf
			<h1>Register</h1>
			<h2>Username</h2>
			<input type="text" id="Username"></input>

			<h2>Password</h2>
			<input type="password" id="Password"></input>

			<h2>Email</h2>
			<input id="Email" type="email"></input>
			<button id="btnRegister" type="submit">Register</button>
		</form>
	</div>
</body>
</html>