<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RunBox extends Model
{
    protected $fillable = [
              'fecha_inicio','import_inicio',
              'fecha_fin','import_fin','box_id'
            ];
}
