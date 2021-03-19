<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Videos extends Model
{
    protected $table = 'videos';

    /**
     * This will let to the app to relate each comment with its video without relate refresh the page
     * It means, for this case, relate the video with all its comments
     */

    public function User()
    {
        //echo "Inside Video-user <br>";
        return $this->belongsTo('App\User', 'User_Id');
    }

    public function comments()
    {
        //dd($this);
        //echo "Inside Video-comments <br>";
        return $this->hasMany(Comments::class)->orderBy('id','desc'); //One To Many
    }
}