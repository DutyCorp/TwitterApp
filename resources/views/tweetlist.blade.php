@foreach ($tweets as $tweet)
	@if ($tweet->UserID == session()->get('UserID'))
		<div>
			<div class="usertweets">
				<p class="user"><b>{{ $tweet->Name }}</b></p>
				<span class="tweet">{{ $tweet->TweetText }}</span>
			</div>
			@if ($tweet->ProfilePicture == '')
			<img class="userphoto" src="{{ asset('img/Face_Blue_128.png') }}"></img>
			@else
			<img class="userphoto" src="{{ asset('uploads/'.$tweet->ProfilePicture) }}"></img>
			@endif
		</div>
	@else
		<div>
			@if ($tweet->ProfilePicture == '')
			<img class="otheruserphoto" src="{{ asset('img/Face_Blue_128.png') }}"></img>
			@else
			<img class="otheruserphoto" src="{{ asset('uploads/'.$tweet->ProfilePicture) }}"></img>
			@endif
			<div class="othertweets">
				<p class="user"><b>{{ $tweet->Name }}</b></p>
				<span class="tweet">{{ $tweet->TweetText }}</span>
			</div>
		</div>
	@endif
@endforeach