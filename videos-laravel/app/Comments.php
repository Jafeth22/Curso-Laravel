<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $table = 'comments';

    ///Relation Many to One
    public function user()
    {
        //echo 'Inside Comments->user';
        return $this->belongsTo(User::class, 'user_id');
    }

    public function video()
    {
        //echo 'Inside Comments->videos';
        return $this->belongsTo('App\Video');
    }
}