<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Light extends Model
{
    protected $fillable = ['id', 'roads_id', 'default_sec', 'now_sec', 'default_max_car', 'now_car', 'created_at', 'updated_at'];
}
