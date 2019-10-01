<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript" src="{{ asset('js/profilescript.js') }}"></script>
</head>
<body>
	<div class="container">
		<h1 class="animate">Twitter Application</h1>
		<div id="profile" class="animate">
			<h1>Profile</h1>
			@if ($User->ProfilePicture == '')
			<img src="{{ asset('img/default.jpg') }}" id="ProfilePicture"><br>
			@else
			<img src="{{ asset('uploads/'.$User->ProfilePicture) }}" id="ProfilePicture"><br>
			@endif
			<input type="file" name="UploadProfilePicture" id="UploadProfilePicture" style="display: none;">
			<button id="btnUpload" name="btnUpload" class="btn" value="Upload" onclick="uploadProfilePicture();">Upload</button><br>
			<input type="email" id="UpdateEmail" name="UpdateEmail" class="input-text" placeholder="Email" value="{{ $User->Email }}"></input><br>
			<input type="password" id="UpdatePassword" name="UpdatePassword" class="input-text" placeholder="Password"></input><br>
			<input type="text" id="UpdateName" name="UpdateName" class="input-text" placeholder="Name" value="{{ $User->Name }}"></input><br>
			<button id="btnUpdateProfile" onclick="postUpdateProfile();" class="btn">Update Profile</button> <button onclick="window.location.href='/'" class="btn" id="btnBack">Back to Home</button>
		</div>
	</div>
</body>
</html>