<?php
namespace App\Http\Controllers;

use Request;
use App\Http\Controllers\Controller;
use App\Permiso;
use Amranidev\Ajaxis\Ajaxis;
use URL;

/**
 * Class PermisoController
 *
 * @author  The scaffold-interface created at 2016-02-10 01:11:09am
 * @link  https://github.com/amranidev/scaffold-interfac
 */
class PermisoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {
        $permisos = Permiso::all();
        return view('permiso.index',compact('permisos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('permiso.create'
                );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = Request::except('_token');

        $permiso = new Permiso();

        
        $permiso->name = $input['name'];

        
        
        $permiso->save();

        return redirect('permiso');
    }

    /**
     * Display the specified resource.
     *
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Request::ajax())
        {
            return URL::to('permiso/'.$id);
        }

        $permiso = Permiso::findOrfail($id);
        return view('permiso.show',compact('permiso'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Request::ajax())
        {
            return URL::to('permiso/'. $id . '/edit');
        }

        
        $permiso = Permiso::findOrfail($id);
        return view('permiso.edit',compact('permiso'
                )
                );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function update($id)
    {
        $input = Request::except('_token');

        $permiso = Permiso::findOrfail($id);
    	
        $permiso->name = $input['name'];
        
        
        $permiso->save();

        return redirect('permiso');
    }

    /**
     * Delete confirmation message by Ajaxis
     *
     * @link  https://github.com/amranidev/ajaxis
     *
     * @return  String
     */
    public function DeleteMsg($id)
    {
        $msg = Ajaxis::MtDeleting('Warning!!','Would you like to remove This?','/permiso/'. $id . '/delete/');

        if(Request::ajax())
        {
            return $msg;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     	$permiso = Permiso::findOrfail($id);
     	$permiso->delete();
        return URL::to('permiso');
    }

}
