<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cars extends Model
{
    protected $table = 'cars';

    //Many to one
    public function FunctionName()
    {
        return $this->belongsTo('App\User','use_id');
    }

    
}
