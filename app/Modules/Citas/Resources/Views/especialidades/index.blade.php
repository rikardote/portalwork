@extends('layouts.app')

@section('title', 'Especialidades')

@section('content')

  <section>
    <div class="container spark-screen">
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="panel panel-primary">
            <div class="panel-heading">@yield('title')</div>
            <div class="panel-body">
              <div id="alert"> @include('flash::message')</div>
                <a data-url="{{ route('citas.especialidades.create') }}" class="load-form-modal  panelColorGreen" data-toggle ="modal" data-target='#form-modal'>
                    <span class="fa fa-plus-circle fa-2x" aria-hidden='true'></span>
                  </a> 
                  <table class= 'table table-striped'>
                    <thead>
                        <th>Nombre</th>

                        <th>Accion</th>
                    </thead>
                    <tbody>
                    @foreach($especialidades as $especialidad)
                        <tr>
                         <td>{{ $especialidad->name }}</td>
                        
                         
                         <td>
                       
                            <a data-url="{{ route('citas.especialidades.edit', $especialidad->id) }}" class="load-form-modal  panelColorGreen" data-toggle ="modal" data-target='#form-modal'>
                               <span class="fa fa-pencil-square-o fa-2x" aria-hidden='true'></span>
                            </a> 
                            <a href="{{ route('admin.especialidades.destroy', $especialidad->id) }}"><span class="fa fa-trash fa-2x panelColorRed" aria-hidden="true"></span></a>
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

@include('partials.form-modal', ['title'=>'Agregar/Editar Medicos'])


@endsection

@section('js')
    
    <script src="{{ asset('js/script.js') }}"></script>
@endsection

@section('nav')
    @include('partials._nav_citas')
@endsection

