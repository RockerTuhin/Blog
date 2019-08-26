<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public function posts()
    {
    	return $this->belongsTo('App\Model\User\Post','likes');
    }
}
