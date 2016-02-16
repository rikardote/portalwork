<?php

namespace App\Modules\Inventario\Http\Domain\Models;

use Illuminate\Database\Eloquent\Model;

class Ip extends Model
{
	protected $connection = 'mysql-inventario';

	protected $table = 'inventario';

    protected $fillable = ['ip', 'name', 'ubicacion_id', 'machine_name'];
}
