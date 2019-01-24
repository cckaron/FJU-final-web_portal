<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Road extends Model
{
    protected $fillable = ['id', 'address', 'created_at', 'updated_at'];
}
