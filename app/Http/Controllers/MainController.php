<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Session;

class MainController extends Controller
{
    public function postLogin(Request $request){
    	$validate = $request->validate([
    		'LoginUsername' => 'required',
    		'LoginPassword' => 'required'
    	]);

    	$userdata = array(
    		'username' => $request->input('LoginUsername'),
    		'password' => $request->input('LoginPassword')
    	);
    	if (Auth::attempt($userdata)){
    		return Redirect::to('/');
    	} else {
    		return Redirect::back()->withErrors('Username or Password is incorrect');
    	}
    }

    public function postRegister(Request $request){
    	$validate = $request->validate([
    		'RegisterUsername' => 'required',
    		'RegisterPassword' => 'required',
    		'RegisterEmail' => 'required'
    	]);
    	$username = $request->input('RegisterUsername');
    	$password = \Hash::make($request->input('RegisterPassword'));
    	$email = $request->input('RegisterEmail');
		
		if (User::where('Username', $username)->exists()){
			return Redirect::back()->withErrors('Username is already taken');
		}
		
    	User::create(array(
    		'Username' => $username,
    		'Password' => $password,
    		'Email' => $email,
    		'ProfilePicture' => ''
    	));

    	$userdata = array(
    		'username' => $username,
    		'password' => $request->input('RegisterPassword')
    	);
    	if (Auth::attempt($userdata)){
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
}
