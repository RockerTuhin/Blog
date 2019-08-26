<?php

namespace App\Model\User;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    public function tags()
    {
    	return $this->belongsToMany('App\Model\User\Tag','tag_posts')->withTimestamps();
    }

    public function categories()
    {
    	return $this->belongsToMany('App\Model\User\Category','category_posts')->withTimestamps();
    }

    public function likes()
    {
        return $this->hasMany('App\Model\User\Like');
    }

    public function getRouteKeyName()
    {
    	return 'slug';
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->diffForHumans();
    }

    public function getSlugAttribute($value)
    {
        return route('post',$value);
    }

}
