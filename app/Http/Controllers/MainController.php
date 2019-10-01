<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Tweet;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Session;
use DB;

class MainController extends Controller
{
    public function postLogin(Request $request){
    	$validate = $request->validate([
    		'LoginEmail' => 'required',
    		'LoginPassword' => 'required'
    	]);

    	$userdata = array(
    		'email' => $request->input('LoginEmail'),
    		'password' => $request->input('LoginPassword')
    	);
    	if (Auth::attempt($userdata)){
    		$User = User::where('Email', $request->input('LoginEmail'))->first();
    		//return $User->UserID;
    		Session::put('UserID', $User->UserID);
            Session::put('Name', $User->Name);
    		return Redirect::to('/');
    	} else {
    		return Redirect::back()->withErrors('Email or Password is incorrect');
    	}
    }

    public function postRegister(Request $request){
    	$validate = $request->validate([
            'RegisterEmail' => 'required',
    		'RegisterName' => 'required',
    		'RegisterPassword' => 'required'
    	]);

        $email = $request->input('RegisterEmail');
    	$name = $request->input('RegisterName');
    	$password = \Hash::make($request->input('RegisterPassword'));
		
		if (User::where('Email', $email)->exists()){
			return Redirect::back()->withErrors('Email is already being used');
		}

    	User::create(array(
            'Email' => $email,
    		'Name' => $name,
    		'Password' => $password,
    		'ProfilePicture' => ''
    	));

    	$userdata = array(
    		'email' => $email,
    		'password' => $request->input('RegisterPassword')
    	);
    	if (Auth::attempt($userdata)){
    		$User = User::where('Email', $email)->first();
    		//return $User->UserID;
    		Session::put('UserID', $User->UserID);
            Session::put('Name', $User->Name);
    		return Redirect::to('/');
    	} else {
    		return Redirect::back()->withErrors('Something is not right here');
    	}
    }

    public function getLogout(){
	    Auth::logout();
	    Session::flush();
	    return Redirect::to('/');
	}

	public function postTweet(Request $request){
		Tweet::create(array(
			'UserID' => Session::get('UserID'),
			'TweetText' => $request->TweetText
		));

		return 'Success';
	}

	public function getRefreshTimeline(){
		$tweets = DB::table('tweet')->join('user', 'user.UserID', '=', 'tweet.UserID')->select('user.UserID', 'user.Email', 'user.Name', 'user.ProfilePicture', 'tweet.TweetID', 'tweet.TweetText', 'tweet.created_at')->orderBy('created_at', 'DESC')->get();
        return view('tweetlist', compact("tweets"));
	}

	public function postSaveProfile(Request $request){

		return 0;
	}
}
