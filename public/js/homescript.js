window.onload = function(){
	refreshTimeline();

	var tweettext = document.getElementById('TweetText');
	tweettext.addEventListener('keyup', function(e){
		if (e.keyCode == 13){
			e.preventDefault();
			document.getElementById('btnSendTweet').click();
		}
	});
};

function refreshTimeline(){
	document.getElementById('divTweetList').innerHTML = '<div class="spinner"></div>';
	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function(){
		document.getElementById('divTweetList').innerHTML = xhr.responseText;
	}
	xhr.open('GET', '/doRefreshTimeline');
	xhr.send();
}

function postTweet(){
	var tweet = document.getElementById("TweetText");
	if(tweet.value == ''){
		alert('Tweet input must be filled!');
	} else {
		var formData = new FormData();
		var csrf = document.querySelector('meta[name="csrf-token"]').content;
		formData.append(tweet.name, tweet.value);
		var xhr = new XMLHttpRequest();
		xhr.onreadystatechange = function(){
			if(xhr.readyState == 4){
				if (xhr.responseText != ''){
					alert(xhr.responseText);
				} else {
					tweet.value = "";
					refreshTimeline();			
				}
			}
		}
		xhr.open('POST', '/doPostTweet');
		xhr.setRequestHeader('X-CSRF-TOKEN', csrf);
		xhr.send(formData);	
	}
	
}
