<?php

namespace App\Modules\Citas\Http\Domain\Models;

use Illuminate\Database\Eloquent\Model;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;


class Medico extends Model implements SluggableInterface
{
    use SluggableTrait;

    protected $sluggable = [
        'build_from' => 'Fullname',
        'save_to'    => 'slug',
    ];
     protected $connection = 'mysql-citas';
     protected $table = 'medicos';

     protected $fillable = ['num_empleado', 'nombres', 'apellido_pat', 'apellido_mat', 'cedula', 'especialidad_id', 'horario_id'];


    public function especialidad()
    {
    	return $this->belongsTo('App\Modules\Citas\Http\Domain\Models\Especialidad');
    }
    public function horario()
    {
    	return $this->belongsTo('App\Modules\Citas\Http\Domain\Models\Horario');
    }
    public function citas()
    {
        return $this->belongsTo('App\Modules\Citas\Http\Domain\Models\Cita');
    }
    public function setnombresAttribute($value)
    {
        $this->attributes['nombres'] = strtoupper($value);
    }
    public function setapellidopatAttribute($value)
    {
        $this->attributes['apellido_pat'] = strtoupper($value);
    }
    public function setapellidomatAttribute($value)
    {
        $this->attributes['apellido_mat'] = strtoupper($value);
    }
  
    public function getFullnameAttribute() {
        return $this->apellido_pat . ' ' . $this->apellido_mat. ' ' . $this->nombres;
    
    }
}

