<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Light extends Model
{
    public function intersection(){
        return $this->belongsTo('App\Road', 'roads_id');
    }
}
