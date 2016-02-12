<?php 
use App\Modules\Inventario\Http\Domain\Models\Ip;

function ipUser($ip)
{	
	$datos = Ip::where('ip', '=', $ip)->get()->first();
	
	switch ($datos->ubicacion_id) {
	    case 1:
	        $datos->color='red';
	        break;
	    case 2:
	        $datos->color='orange';
	        break;
	    case 3:
	        $datos->color='purple';
	        break;
	    case 4:
	        $datos->color='#3C338D';
	        break;
	    case 5:
	        $datos->color='#3399FF';
	        break;
	    case 6:
	        $datos->color='#669999';
	        break;
        case 7:
        	$datos->color='#990066';
        	break;
        case 8:
        	$datos->color='#9999FF';
        	break;
        case 9:
        	$datos->color='#000000';
        	break;
	}
	return $datos;

	
}
function fecha_dmy($date){
	return date('d/m/Y', strtotime(str_replace('/', '-', $date)));
}