<?php

namespace App\Modules\Citas\Http\Domain\Models;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    protected $connection = 'mysql-citas';
    protected $table = 'citas';

    protected $fillable = ['paciente_id', 'medico_id', 'user_id', 'fecha', 'horario', 'concretada', 'capturado_por'];

    public function paciente()
    {
    	return $this->belongsTo('App\Modules\Citas\Http\Domain\Models\Paciente');
    }
     public function medico()
    {
    	return $this->hasMany('App\Modules\Citas\Http\Domain\Models\Medico');
    }
    public function getidAttribute($value)
    {
        return str_pad($value, 6, '0', STR_PAD_LEFT);
    }
}
