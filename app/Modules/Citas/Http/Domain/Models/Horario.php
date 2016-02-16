<?php
namespace App\Modules\Citas\Http\Domain\Models;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
	 protected $connection = 'mysql-citas';
     protected $table = 'horarios';

     protected $fillable = ['name'];

    public function medicos()
    {
    	return $this->hasMany('App\Modules\Citas\Http\Domain\Models\Horario');
    }
}
