<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Abono extends Model
{
    public function GetIntendenteById() {
        return $this->hasOne(Intendente::class,'id','id_abonado');
    }
}
