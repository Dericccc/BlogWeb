<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timelast extends Model
{
    protected $table = 'timelasts';

    public function posts(){


        return $this->hasMany('App\Post');
    }
}
