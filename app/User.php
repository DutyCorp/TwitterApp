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
    protected $fillable = ['Email', 'Name', 'Password', 'ProfilePicture'];

    public function getAuthIdentifier() {
		return $this->getKey();
	}

    public function getAuthPassword() {
	    return $this->Password; 
	}

	public function tweets()
    {
        return $this->hasMany('App\Tweet');
    }
}
