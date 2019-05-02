<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
    public function intersection(){
        return $this->belongsTo('App\Intersection', 'intersections_id');
    }

    public function condition(){
        return $this->hasMany('App\Condition', 'rules_id', 'id');
    }
}
