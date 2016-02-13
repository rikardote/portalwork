@extends('layouts.app')

@section('title', 'Pacientes')

@section('content')

<section>
  <div class="container spark-screen">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-primary">
          <div class="panel-heading">@yield('title')</div>
          <div class="panel-body">
            <div id="alert"> @include('flash::message')</div>
             <a data-url="{{ route('citas.pacientes.create') }}" class="load-form-modal  panelColorGreen" data-toggle ="modal" data-target='#form-modal'><span class="fa fa-plus-circle fa-2x" aria-hidden='true'></span>
             </a> 
            <table class="table table-striped">
            <thead>
                <th>RFC</th>
                <th>Nombre</th>
                <th>Accion</th>
            </thead>
            <tbody>
            @foreach($pacientes as $paciente)
                <tr>
                <td>{{ $paciente->rfc }} /{{$paciente->tipo->code}}</td>
                 <td>{{ $paciente->apellido_pat }} {{ $paciente->apellido_mat }} {{ $paciente->nombres }}</td>
                
                 
                 <td>
                    <a data-url="{{ route('citas.pacientes.edit', $paciente->id) }}" class="load-form-modal  panelColorGreen" data-toggle ="modal" data-target='#form-modal'>
                        <span class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></span>
                    </a>
                    <a href="{{ route('admin.pacientes.destroy', $paciente->id) }}" <span class="fa fa-trash fa-2x panelColorRed" aria-hidden="true"></span></a>
                 </td>
                </tr>
            @endforeach
            </tbody>
            </table>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>



{!! $pacientes->render() !!}

@include('partials.form-modal', ['title'=>'Agregar/Editar Pacientes'])


@endsection

@section('js')
    
    <script src="{{ asset('js/script.js') }}"></script>
@endsection

@section('nav')
    @include('partials._nav_citas')
@endsection
