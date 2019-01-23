<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Arduino extends Model
{
    protected $fillable = ["light1", "light2", "light3", "light4", "created_at", "updated_at"];
}
