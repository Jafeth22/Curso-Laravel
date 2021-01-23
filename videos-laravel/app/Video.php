<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table = 'videos';

    //Relation One to Many
    public function Comments()
    {
        # code...
    }
}
