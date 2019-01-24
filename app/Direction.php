<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Direction extends Model
{
    protected $fillable = ['direct', 'remark', 'created_at', 'updated_at'];
}
