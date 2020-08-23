<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movement extends Model
{
    public function tipomovimiento() {
        return $this->belongsTo(TypeMovement::class,'type_movement_id');
    }
    public function box() {
        return $this->belongsTo(Box::class);
    }
}
