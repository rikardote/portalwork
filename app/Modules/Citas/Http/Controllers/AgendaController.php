<?php

namespace App\Modules\citas\Http\Controllers;

use Illuminate\Http\Request;

//use App\Http\Requests;
use App\Http\Controllers\Controller;
//use App\Modules\Inventario\Http\Requests\IpRequest;
use App\Modules\Inventario\Http\Domain\Models\Ip;
//use App\User;

use App\Modules\Citas\Http\Domain\Models\Especialidad;
use App\Modules\Citas\Http\Domain\Models\Medico;
use App\User;

class AgendaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    public function __construct()
    {
        $this->middleware('auth');
        
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        $user = User::find(\Auth::user()->id);
        $user_espe = $user->especialidades;

        return view('citas::agenda.index')->with('especialidades', $user_espe);
    }

    public function show($slug)
    {
                
        $especialidad = Especialidad::SearchEspecialidad($slug)->first();
        $medicos = $especialidad->medicos()->get();
        
        $medicos->each(function($medicos) {
            $medicos->especialidad;
            $medicos->horario;
            
        });
        $date = date('Y-m-d');

        return view('citas::agenda.show')->with('medicos', $medicos)->with('date', $date);
    }
}
