/*document.addEventListener("DOMContentLoaded", function(event) {
	refreshTimeline();
});*/
window.onload = function(){
	refreshTimeline();
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
		//document.getElementById('divTweetList').innerHTML = '<div class="spinner"></div>';
		var xhr = new XMLHttpRequest();
		xhr.onreadystatechange = function(){
			if(xhr.readyState == 4){
				console.log(xhr.responseText);
				refreshTimeline();	
			}
		}
		xhr.open('POST', '/doPostTweet');
		xhr.setRequestHeader('X-CSRF-TOKEN', csrf);
		xhr.send(formData);	
	}
	
}