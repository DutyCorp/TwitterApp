<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
	public $table = "User";
    protected $fillable = ['Username', 'Password', 'Email', 'ProfilePicture'];
}
