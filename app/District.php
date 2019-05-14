<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $fillable=['id', 'name','cities_id', 'created_at', 'updated_at'];

    public function district(){
        return $this->belongsTo('App\City', 'cities_id');
    }
}
