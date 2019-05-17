<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Intersection extends Model
{
    public function road(){
        return $this->belongsToMany('App\Road', 'intersection_road', 'intersections_id', 'roads_id', 'id', 'id');
    }

    public function rule(){
        return $this->hasMany('App\rule', 'intersections_id', 'id');
    }

    public function light(){
        return $this->hasMany('App\light', 'intersections_id', 'id');
    }

}
