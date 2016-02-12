<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PermisoController
 *
 * @author  The scaffold-interface created at 2016-02-10 01:11:09am
 * @link  https://github.com/amranidev/scaffold-interfac
 */
class Permiso extends Model
{

    public $timestamps = false;

    protected $table = 'permisos';

	public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
