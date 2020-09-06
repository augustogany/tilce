<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Envase extends Model
{
    public function type(){
        return $this->belongsTo(Type::class);
    }
}
