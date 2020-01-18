<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    protected $fillable = ['id','dni', 'nombres', 'apellidos', 'telefono', 'created_at', 'updated_at'];
}
