<?php

namespace App\Modules\Citas\Http\Domain\Models;

use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
     protected $connection = 'mysql-citas';    
     protected $table = 'tipos';

     protected $fillable = ['tipo', 'descripcion'];

    public function Pacientes()
    {
    	return $this->hasMany('App\Modules\Citas\Http\Domain\Models\Paciente');
    }

    public function getTipoAttribute($value)
    {
        
       return $this->code . ' - ' . $this->descripcion;
        
    }
     public function getCodeAttribute($value)
    {
        return str_pad($value, 2, '0', STR_PAD_LEFT);
    }

}
