<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $fillable=['id', 'name','cities_id', 'created_at', 'updated_at'];

    public function city(){
        return $this->belongsTo('App\City', 'cities_id');
    }

    public function road(){
        return $this->hasMany('App\Road', 'districts_id', 'id');
    }
}
