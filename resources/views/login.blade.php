<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('style.css') }}">
</head>
<body>
	<div class="container">
		<h1>Twitter App</h1>
		<div id="divLogin">
			<form action="/doLogin" method="post">
				@csrf
				<h1>Login</h1>

				<input type="text" id="LoginUsername" name="LoginUsername" class="input-text" placeholder="Username"></input><br>

				<input type="password" id="LoginPassword" name="LoginPassword" class="input-text" placeholder="Password"></input><br>
				<button id="btnLogin" type="submit" class="btn">Login</button>
			</form>
		</div>

		<div id="divError">
		@if ($errors->any())
			@foreach ($errors->all() as $error)
			<p>{{ $error }}</p>
			@endforeach
		@endif
		</div>

		<div id="divRegister">
			<form action="/doRegister" method="post">
				@csrf
				<h1>Register</h1>
				<input type="text" id="RegisterUsername" name="RegisterUsername" class="input-text" placeholder="Username"></input><br>

				<input type="password" id="RegisterPassword" name="RegisterPassword" class="input-text" placeholder="Password"></input><br>

				<input id="RegisterEmail" type="email" name="RegisterEmail" class="input-text" placeholder="Email"></input><br>
				<button id="btnRegister" type="submit" class="btn">Register</button>
			</form>
		</div>
	</div>
</body>
</html>