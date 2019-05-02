<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Condition extends Model
{
    public function intersection(){
        return $this->belongsTo('App\Rule', 'rules_id');
    }
}
