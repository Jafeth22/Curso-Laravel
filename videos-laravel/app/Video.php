<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table = 'videos';

    //Relation One to Many
    /**
     * This will let to the app to relate each comment with its video without relate refresh the page
     * It means, for this case, relate the video with all its comments
     */
    // public function Comments()
    // {
    //     return $this->hasMany('App\Comment');//$this->hasMany(Comment::class); //or this other way: 
    // }

    public function User()
    {
        return $this->belongsTo('App\User', 'User_Id');
    }

    public function Comments()
    {
        return $this->belongsTo('App\Comment', 'ID');
    }
    
    public function Commenta2()
    {
        return $this->hasMany('App\Comment');
    }

    //One to One
    //$this->hasOne();
}