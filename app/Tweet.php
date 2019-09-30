<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    public $table = "Tweet";
    protected $fillable = ['UserID', 'TweetText'];
}
