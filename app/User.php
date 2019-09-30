<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements Authenticatable
{
	use AuthenticableTrait;
	public $table = "User";
	protected $primaryKey = 'UserID';
    protected $fillable = ['Username', 'Password', 'Email', 'ProfilePicture'];

    public function getAuthIdentifier() {
		return $this->getKey();
	}

    public function getAuthPassword() {
	    return $this->Password; 
	}
}
