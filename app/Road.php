<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Road extends Model
{
    public function intersection(){
        return $this->belongsTo('App\Intersection', 'intersections_id');
    }

    public function light(){
        return $this->hasMany('App\Light', 'roads_id', 'id');
    }
}
