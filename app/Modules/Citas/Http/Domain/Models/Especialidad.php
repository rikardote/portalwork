<?php

namespace App\Modules\Citas\Http\Domain\Models;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

use Illuminate\Database\Eloquent\Model;

class Especialidad extends Model implements SluggableInterface
{
    use SluggableTrait;

    protected $sluggable = [
        'build_from' => 'name',
        'save_to'    => 'slug',
    ];
    protected $connection = 'mysql-citas';
    protected $table = 'especialidades';

    protected $fillable = ['name'];

    public function medicos()
    {
    	return $this->hasMany('App\Modules\Citas\Http\Domain\Models\Medico');
    }
    public function users()
    {
        return $this->belongsToMany('App\Modules\Citas\Http\Domain\Models\User');
    }
    public function setnameAttribute($value)
    {
        $this->attributes['name'] = strtoupper($value);
    }
    public function scopeSearchEspecialidad($query, $slug)
    {
        return $query->where('slug', '=', $slug);
    }
    
}
