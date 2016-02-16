@extends('layouts.app_citas')

@section('title', 'Medicos')

@section('content')

 <div class="supreme-container"> 
  <a data-url="{{ route('citas.medicos.create') }}" class="load-form-modal  panelColorGreen" data-toggle ="modal" data-target='#form-modal'>
  <span class="fa fa-plus-circle fa-2x" aria-hidden='true'></span>
  </a> 
  <table class="table table-striped">
    <thead>
    <th>Num Empleado</th>
    <th>Nombre</th>
    <th>Cedula</th>
    <th>Especialidad</th>
    <th>Horario</th>

    <th>Accion</th>
    </thead>
    <tbody>
    @foreach($medicos as $medico)
      <tr>
      <td>{{ $medico->num_empleado }}</td>
      <td>{{ $medico->apellido_pat }} {{ $medico->apellido_mat }} {{ $medico->nombres }}</td>
      <td>{{ $medico->cedula }}</td>
      <td>{{ $medico->especialidad->name }}</td>
      <td>{{ $medico->horario->name }}</td>


      <td>
      <a data-url="{{ route('citas.medicos.edit', $medico->id) }}" class="load-form-modal  panelColorGreen" data-toggle ="modal" data-target='#form-modal'>
      <span class="fa fa-pencil-square-o fa-2x" aria-hidden='true'></span>
      </a> 
      <a href="{{ route('admin.medicos.destroy', $medico->id) }}" ><span class="fa fa-trash fa-2x panelColorRed" aria-hidden="true"></span></a>
      </td>
      </tr>
    @endforeach
    </tbody>
  </table>
  </div>         




@include('partials.form-modal', ['title'=>'Agregar/Editar Medicos'])


@endsection

@section('js')
    
   
@endsection

