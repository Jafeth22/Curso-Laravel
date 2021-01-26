<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    ///Relation Many to One
    public function User()
    {
        return $this->hasMany('App\User', 'User_Id'); //$this->hasMany(User::class);
    }

    public function Videos()
    {
        return $this->belongsTo(Video::class); //$this->hasMany(User::class);
    }

    //One to One
    //$this->hasOne();
}