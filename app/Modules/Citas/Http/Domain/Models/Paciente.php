<?php

namespace App\Modules\Citas\Http\Domain\Models;

use Illuminate\Database\Eloquent\Model;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Paciente extends Model implements SluggableInterface
{
    use SluggableTrait;

    protected $sluggable = [
        'build_from' => 'Fullname',
        'save_to'    => 'slug',
    ];
    protected $connection = 'mysql-citas';
    protected $table = 'pacientes';
    protected $fillable = ['rfc', 'nombres', 'apellido_pat', 'apellido_mat', 'tipo_id'];

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
    public function setrfcAttribute($value)
    {
        $this->attributes['rfc'] = strtoupper($value);
    }
    public function getFullnameAttribute() {
        return $this->apellido_pat . ' ' . $this->apellido_mat. ' ' . $this->nombres;
    
    }
    public function cita()
    {
        return $this->hasMany('App\Modules\Citas\Http\Domain\Models\Cita');
    }
   public function tipo()
    {
        return $this->belongsTo('App\Modules\Citas\Http\Domain\Models\Tipo');
    }
  
}
