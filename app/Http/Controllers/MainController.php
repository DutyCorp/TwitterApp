<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class MainController extends Controller
{
    public function Login(Request $request){
    	return $request;
    }

    public function Register(Request $request){
    	//return $request;
    	$username = $request->input('RegisterUsername');
    	$password = encrypt($request->input('RegisterPassword'));
    	$email = $request->input('RegisterEmail');


    	User::create(array(
    		'Username' => $username,
    		'Password' => $password,
    		'Email' => $email,
    		'ProfilePicture' => ''
    	));

    	return $request;
    }
}
