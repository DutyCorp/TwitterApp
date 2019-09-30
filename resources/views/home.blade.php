<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('style.css') }}">
</head>
<body>
	<div class="container">
		<div id="divTweet">
			<input type="text" name="TweetText" id="TweetText" class="input-text" placeholder="Tweet">
			<button type="submit" id="btnSendTweet" name="btnSendTweet" class="btn">Send Tweet</button>
		</div>
		
		<div class="divTweetList">
			
		</div>
		<button onclick="window.location.href='/doLogout'" class="btn">Logout</button>
	</div>
</body>
</html>