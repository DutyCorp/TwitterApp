<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<div class="container">
		<h1 class="animate">Twitter</h1>
		<div id="divLogin" class="animate"> 
			<form action="/doLogin" method="post">
				@csrf
				<h1>Login</h1>
				<input type="email" id="LoginEmail" name="LoginEmail" class="input-text" placeholder="Email"></input><br>
				<input type="password" id="LoginPassword" name="LoginPassword" class="input-text" placeholder="Password"></input><br>
				<button id="btnLogin" type="submit" class="btn">Login</button>
			</form>
		</div>

		<div id="divError" class="animate">
		@if ($errors->any())
			@foreach ($errors->all() as $error)
			<p>{{ $error }}</p>
			@endforeach
		@endif
		</div>

		<div id="divRegister" class="animate">
			<form action="/doRegister" method="post">
				@csrf
				<h1>Register</h1>
				<input id="RegisterEmail" type="email" name="RegisterEmail" class="input-text" placeholder="Email"></input><br>
				<input type="text" id="RegisterName" name="RegisterName" class="input-text" placeholder="Name"></input><br>
				<input type="password" id="RegisterPassword" name="RegisterPassword" class="input-text" placeholder="Password"></input><br>
				<button id="btnRegister" type="submit" class="btn">Register</button>
			</form>
		</div>
	</div>
</body>
</html>