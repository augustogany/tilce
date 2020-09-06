<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    protected $table = 'detalle_ventas';

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
