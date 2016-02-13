<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function permisos()
    {
        return $this->belongsToMany('App\Permiso');//->withTimestamps();
    }
    public function especialidades()
    {
        return $this->belongsToMany('App\Modules\Citas\Http\Domain\Models\Especialidad')->withTimestamps();
    }
    public function admin() 
    {
        return $this->type === 'admin';
    }
    public function setnameAttribute($value)
    {
        $this->attributes['name'] = strtoupper($value);
    }
}
