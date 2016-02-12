<?php

namespace App\Modules\inventario\Http\Controllers;

use Illuminate\Http\Request;

//use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Modules\Inventario\Http\Requests\IpRequest;
use App\Modules\Inventario\Http\Domain\Models\Ip;
use App\User;
//use Toastr;
//use Laracasts\Flash\Flash;

class IpsController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');

    }
    public function index()
    {	
        $site = "inventario";

        $user = User::find(\Auth::user()->id);
        $user_espe = $user->permisos;
        $s = explode(",", $user_espe->implode('name', ','));
            
        if( !in_array($site, $s) ) {
            return redirect()->back();
        }
        else {
            $ips = Ip::all()->toArray();
            //$ips = Ip::where('ubicacion_id', '=', 0)->get()->toArray();
            while($row = array_shift($ips)) {
                 $json[] = $row['ip'];
            }
     
                $x = json_encode($json);
                $s = json_decode($x);
                //dd($s);
                //$datos = Ip::where('ip', '=', $ip);
                return view('inventario::ip.index')->with('ips', $s);
            }
        }   

    public function show($ubicacion_id)
    {   
        //$ips = Ip::all()->toArray();
        if ($ubicacion_id == 0) {
                $ips = Ip::all()->toArray();
            }else {
                $ips = Ip::where('ubicacion_id', '=', $ubicacion_id)->get()->toArray();
            }
        
        while($row = array_shift($ips)) {
             $json[] = $row['ip'];
        }
 
            $x = json_encode($json);
            $s = json_decode($x);
            //dd($s);
            //$datos = Ip::where('ip', '=', $ip);
            if ($ubicacion_id == 0) {
                return view('inventario::ip.libres')->with('ips', $s);
            }else {
                return view('inventario::ip.show')->with('ips', $s);
            }
            
        
    }   	

    public function create($ip) 
    {
    	return view('inventario::ip.create')->with('ip', $ip);
    }

    public function edit($ip) 
    {
        $datos = Ip::where('ip', '=', $ip)->get()->first();
      
    	return view('inventario::ip.edit')->with('datos', $datos);
    }

    public function store(IpRequest $request) 
    {
    	$datos = new Ip($request->all());	
    	$datos->save();

		//Toastr::success('Ip Asignada Correctamente');
    	return redirect('inventario');
    }

    public function update(Request $request, $id)
    {
		$dato = Ip::find($id);
        $dato->fill($request->all());
        $dato->save();
		//Toastr::success('Ip Actualizada Correctamente');
		//Flash::success('Ip Actualizada Correctamente');
        return redirect('inventario');
    }
	public function destroy($id)
    {
        $dato = Ip::find($id);

        $dato->delete();
      	//Toastr::error('Ip Liberada Correctamente');
        return redirect('inventario');
    } 

}
