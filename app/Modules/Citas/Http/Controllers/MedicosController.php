<?php

namespace App\Modules\Citas\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Modules\Citas\Http\Requests\MedicosRequest;

use App\Modules\Citas\Http\Domain\Models\Medico;
use App\Modules\Citas\Http\Domain\Models\Especialidad;
use App\Modules\Citas\Http\Domain\Models\Horario;
use Laracasts\Flash\Flash;

class MedicosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {	
        //if (!\Auth::user()->admin()) {
          //  return redirect()->route('citas.agenda.index');
       // }
    	$medicos = Medico::orderBy('num_empleado', 'ASC')->get();

        $medicos->each(function($medicos) {
            $medicos->especialidad;
            $medicos->horario;
            
        });
    
    	return view('citas::medicos.index')->with('medicos', $medicos);
    }

    public function create()
    {
        //dd('hola');
    	$especialidades = Especialidad::all()->lists('name', 'id')->toArray();
    	$horarios = horario::all()->lists('name', 'id')->toArray();
        return view('citas::medicos.createorupdate')
        	->with('especialidades', $especialidades)
        	->with('horarios', $horarios);
    }
 
    public function edit($id)
    {
        $medico = Medico::find($id);
        $especialidades = Especialidad::all()->lists('name', 'id')->toArray();
        $horarios = horario::all()->lists('name', 'id')->toArray();
        return view('citas::medicos.createorupdate')
            ->with('medico', $medico)
            ->with('especialidades', $especialidades)
            ->with('horarios', $horarios);
        
        
    }

    public function update(Request $request, $id)
    {
        $medico = Medico::find($id);
        $medico->fill($request->all());

        $medico->save();
        Flash::success('Medico editado con exito!');
        return redirect()->route('citas.medicos.index');
    }

    public function store(MedicosRequest $request)
    {
        $medico = new Medico($request->all());
        $medico->save();

        Flash::success('Medico registrado con exito!');
        return redirect()->route('citas.medicos.index');
    }  

    public function destroy($id)
    {
        $medico = Medico::find($id);
        $medico->delete();

        Flash::error('El Medico ' . $medico->name . ' ha sido borrada con exito!');
        return redirect()->route('citas.medicos.index');
    } 
}
