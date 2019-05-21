<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Road extends Model
{
    public $incrementing = false;

    public function intersection(){
        return $this->belongsToMany('App\Intersection', 'intersection_road', 'roads_id', 'intersections_id','id', 'id');
    }

    public function light(){
        return $this->hasMany('App\Light', 'roads_id', 'id');
    }
}
