<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Light_Direction extends Model
{
    protected $fillable = ['lights_id', 'directions_direct', 'time', 'car_count', 'created_at', 'updated_at'];
}
