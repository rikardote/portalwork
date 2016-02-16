<?php

namespace App\Modules\Citas\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Modules\Citas\Http\Requests\HorariosRequest;

use App\Modules\Citas\Http\Domain\Models\Horario;
use Laracasts\Flash\Flash;

class HorariosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {	
        /*if (!\Auth::user()->admin()) {
            return redirect()->route('agenda.index');
        }*/
    	$horarios = Horario::orderBy('name', 'DESC')->get();
    	return view('citas::horarios.index')->with('horarios', $horarios);
    }

    public function create()
    {
    	
        return view('citas::horarios.createorupdate');
    }

    public function edit($id)
    {
        $horario = Horario::find($id);
        
        return view('citas::horarios.createorupdate')->with('horario', $horario);
    }

    public function update(Request $request, $id)
    {
        $horario = Horario::find($id);
        $horario->fill($request->all());

        $horario->save();
        Flash::success('Horario editado con exito!');
        return redirect()->route('citas.horarios.index');
    }

    public function store(HorariosRequest $request)
    {
        $horario = new Horario($request->all());
        $horario->save();

        Flash::success('Horario registrado con exito!');
        return redirect()->route('citas.horarios.index');
    }  

    public function destroy($id)
    {
        $horario = Horario::find($id);
        $horario->delete();

        Flash::error('El Horario de ' . $horario->name . ' ha sido borrado con exito!');
        return redirect()->route('citas.horarios.index');
    } 
}
