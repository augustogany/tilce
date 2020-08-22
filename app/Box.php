<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Box extends Model
{
    public function runbox (){
        return $this->hasMany(RunBox::class);
    }
}
