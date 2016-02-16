<?php

/*
|--------------------------------------------------------------------------
| Module Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for the module.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::group(['prefix' => 'citas'], function() {
    Route::group(['middleware' => 'web'], function () {
    
    Route::get('/', [
        'as' => 'admin.index',
        'uses' => 'AgendaController@index'
    ]);

    
    Route::resource('registrar', 'RegistroController');   
    Route::get('registrar/{id}/destroy', [
        'uses' => 'RegistroController@destroy',
        'as' => 'registrar.destroy'
    ]);

    Route::resource('agenda', 'AgendaController');
    
   // Rutas Especialidades //
    Route::resource('especialidades', 'EspecialidadesController');
    
    Route::get('especialidades/{id}/destroy', [
        'uses' => 'EspecialidadesController@destroy',
        'as' => 'admin.especialidades.destroy'
    ]);
    // Rutas Medicos //
    Route::resource('medicos', 'MedicosController');
    Route::get('medicos/{id}/destroy', [
        'uses' => 'MedicosController@destroy',
        'as' => 'admin.medicos.destroy'
    ]);

     // Rutas Horarios //
    Route::resource('horarios', 'HorariosController');
    Route::get('horarios/{id}/destroy', [
        'uses' => 'HorariosController@destroy',
        'as' => 'admin.horarios.destroy'
    ]);
    // Rutas Pacientes //
    Route::resource('pacientes', 'PacientesController');
    Route::get('pacientes/{id}/destroy', [
        'uses' => 'PacientesController@destroy',
        'as' => 'admin.pacientes.destroy'
    ]);
    // Rutas Citas //
    //Route::resource('citas', 'CitasController');
    Route::get('/{id}/{date}', [
        'uses' => 'CitasController@show',
        'as' => 'admin.citas.show'
    ]);
    Route::patch('/{slug}/{date}/{id}/update', [
        'uses' => 'CitasController@update',
        'as' => 'admin.citas.update'
    ]);
    Route::get('/{slug}/{date}/{id}/edit', [
        'uses' => 'CitasController@edit',
        'as' => 'admin.citas.edit'
    ]);
    Route::get('/{slug}/{date}/{id}/destroy', [
        'uses' => 'CitasController@destroy',
        'as' => 'admin.citas.destroy'
    ]);
    Route::get('/{id}/{date}/nueva_cita/', [
        'uses' => 'CitasController@nueva_cita',
        'as' => 'citas.nueva_cita'
    ]);
    Route::post('/{slug}/{date}/nueva_cita/paciente', [
        'uses' => 'CitasController@store',
        'as' => 'admin.citas.store'
    ]);
    Route::get('/{slug}/{date}/{id}/concretada', [
        'uses' => 'CitasController@concretada',
        'as' => 'admin.citas.concretada'
    ]);



    Route::get('/{slug}/{date}/nueva_cita/paciente', [
        'uses' => 'SearchPacientesController@index',
        'as' => 'pacientes.search'
    ]);
    
    Route::get('/{slug}/{date}/nueva_cita/paciente/nuevo_paciente/{rfc}', [
        'uses' => 'SearchPacientesController@NuevoPaciente',
        'as' => 'admin.pacientes.create'
    ]);
    
    Route::post('/{slug}/{date}/nueva_cita/paciente/nuevo_paciente/create', [
        'uses' => 'SearchPacientesController@StorePaciente',
        'as' => 'admin.pacientes.store'
    ]);

    });
});