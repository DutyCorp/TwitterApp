@foreach ($tweets as $tweet)
	@if ($tweet->UserID == session()->get('UserID'))
		<div>
			<div class="usertweets">
				<p class="user"><b>{{ $tweet->Name }}</b></p>
				<span class="tweet">{{ $tweet->TweetText }}</span>
			</div>
			<img class="userphoto" src="{{ asset('Face_Blue_128.png') }}"></img>
		</div>
	@else
		<div>
			<img class="otheruserphoto" src="{{ asset('Face_Blue_128.png') }}"></img>
			<div class="othertweets">
				<p class="user"><b>{{ $tweet->Name }}</b></p>
				<span class="tweet">{{ $tweet->TweetText }}</span>
			</div>
		</div>
	@endif
@endforeach