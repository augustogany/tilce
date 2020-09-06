<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{

  public function customer(){
      return $this->belongsTo(Customer::class);
  }

  public function user(){
    return $this->belongsTo(User::class);
  }

  public function type_payment(){
    return $this->belongsTo(TypePayment::class,'type_payment_id');
  }
  
  public function type_sale(){
    return $this->belongsTo(TypeSale::class,'type_sale_id');
  }

  public function detalles(){
    return $this->hasMany(DetalleVenta::class,'venta_id');
  }
}
