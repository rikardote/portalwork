<?php

namespace App\Modules\Citas\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Modules\Citas\Http\Requests\CitasRequest;

use App\Modules\Citas\Http\Domain\Models\Cita;
use App\Modules\Citas\Http\Domain\Models\Especialidad;
use App\Modules\Citas\Http\Domain\Models\Medico;
use App\Modules\Citas\Http\Domain\Models\Paciente;

use App\Modules\Citas\Http\Domain\Models\User;
use Carbon\Carbon;
use Toastr;


class CitasController extends Controller
{
	
   public function __construct()
    {
        $this->middleware('auth');
        setlocale(LC_ALL,"es_MX.utf8");
    }

	public function show($slug,$date){
        
        if (isset($_GET["date"])) {
            $date = $_GET["date"];
        }
        $date = fecha_ymd($date);  

		$medico = Medico::findBySlug($slug);
        $citas = Cita::orderBy('id', 'ASC')->where('medico_id', '=' , $medico->id)->where('fecha', '=', $date)->get();
        $citas->each(function($citas) {
            $citas->paciente;

        });
	       
       
		return view('citas::citas.index')->with('medico', $medico)->with('citas', $citas)->with('date', $date);
       /* 
        $html = view('welcome')->with('medico', $medico)->with('citas', $citas)->with('date', $date)->render();

        return $this->pdf
            ->load($html)
            ->download();   
       */
	}

	public function nueva_cita($slug, $date)
    {
    	$medico = Medico::findBySlug($slug);
		$medico->especialidad;

        return view('citas::citas.buscar_paciente')->with('medico', $medico)->with('date', $date);
        	
    }

    public function edit($slug,$date,$id)
    {
        $cita = Cita::find($id);
        $cita->paciente;
       
        $medico = Medico::findBySlug($slug);
        $medico->especialidad;
       
        return view('citas::citas.edit')->with('cita', $cita)->with('medico', $medico)->with('date', $date);
        
    }

    public function update(Request $request, $slug,$date,$id)
    {
        $cita = Cita::find($id);
        $cita->fill($request->all());
        $cita->capturado_por  = \Auth::user()->id;
        $cita->fecha = fecha_ymd($request->fecha);
        $cita->save();
        
        Toastr::success('Cita actualizada exitosamente');
        return redirect()->route('admin.citas.show', ['slug' => $request->slug, 'date' => $date]);
 
    }

    public function store(CitasRequest $request, $slug, $date)
    {

        $cita = new Cita($request->all());

        $cita->fecha = fecha_ymd($request->fecha);
        $cita->capturado_por = \Auth::user()->id;
        $cita->save();

        //Flash::success('Cita registrada con exito!');
        Toastr::success('Cita generada con exito');
        return redirect()->route('admin.citas.show', ['slug' => $slug, 'date' => $request->date]);
    }  
 
    public function destroy($slug, $date, $id)
    {
        $cita = Cita::find($id);

        $cita->delete();
       
        Toastr::error('Cita borrada exitosamente');
        return redirect()->route('admin.citas.show', ['slug' => $slug, 'date' => $date]);
    } 
    public function concretada($slug,$date,$id)
    {
    	$cita = Cita::find($id);
   		if ($cita->concretada == 1) {
   			$cita->concretada = 0;
   		}
   		else{
   			$cita->concretada = 1;
   		}

       	$cita->save();
       
        $medico = Medico::findBySlug($slug);
        $medico->especialidad;
        Toastr::success('Cita Concretada');
        return redirect()->route('admin.citas.show', ['slug' => $slug, 'date' => $date]);
       
    }
    
	
    
}
