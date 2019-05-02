<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Intersection extends Model
{
    public function road(){
        return $this->hasMany('App\Road', 'intersections_id', 'id');
    }

    public function rule(){
        return $this->hasMany('App\rule', 'intersections_id', 'id');
    }
}
