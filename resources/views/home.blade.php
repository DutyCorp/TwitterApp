<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('style.css') }}">
	<script type="text/javascript" src="{{ asset('script.js') }}"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<div class="container" >
		<h1 class="animate">Welcome to Twitter, {{ session()->get('Name') }}</h1>
		<div id="divTweet" class="animate">
			<input type="text" name="TweetText" id="TweetText" class="input-text" placeholder="Tweet">
			<button type="submit" id="btnSendTweet" name="btnSendTweet" class="btn" onclick="postTweet();">Send Tweet</button>
		</div>
		
		<div id="divTweetList" class="animate">
				
		</div>
		<div id="buttonfooter">
			<button onclick="window.location.href='/doLogout'" class="btn animate" id="btnLogout">Logout</button>
			<button onclick="window.location.href='/profile'" class="btn animate" id="btnProfile">Profle</button>
		</div>
	</div>
</body>
</html>