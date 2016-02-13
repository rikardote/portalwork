@extends('layouts.app')

@section('title', 'Dr. ' . $medico->apellido_pat . ' ' . $medico->apellido_mat . ' ' . $medico->nombres . ' / ' . $medico->especialidad->name)

@section('content')
<section>
    <div class="container spark-screen">
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="panel panel-primary">
            <div class="panel-heading">@yield('title')</div>
            <div class="panel-body">
              <div id="alert"> @include('flash::message')</div>
             

              <strong>Pacientes: </strong>
				<br>
				<br>
			@if($pacientes->count() == 1)

				@foreach($pacientes as $paciente)
					{{ $paciente->nombres }} {{ $paciente->apellido_pat }} {{ $paciente->apellido_mat }} /{{ $paciente->tipo->code }}
					<br>

					{!! Form::open(['route' => ['admin.citas.store', $medico->slug, $date], 'method' => 'POST', 'class' => 'datepickerform']) !!}
						
					<div class="form-group">
						{!! Form::label('fecha', 'Fecha') !!}
						
						{!! Form::text('fecha', fecha_dmy($date), [
							
							'class' => 'form-control',
							'placeholder' => 'Selecciona la fecha', 
							'required',
							'id' => $paciente->id
						]) !!}
					</div>
					<div class="form-group">
						{!! Form::label('horario', 'Horario') !!}
						
						{!! Form::text('horario', null, [
							
							'class' => 'form-control',
							'placeholder' => 'Ingresa un horario', 
							'required'
						]) !!}
					</div>

					{{ Form::hidden('medico_id', $medico->id) }}
					{{ Form::hidden('paciente_id', $paciente->id) }}
					{{ Form::hidden('slug', $medico->slug) }}
					{!! Form::submit('Registrar', ['class' => 'btn btn-success']) !!}
					{!! Form::close() !!}
				@endforeach

				
			@else
			@foreach($pacientes as $paciente)
			 <a type="button" data-toggle="collapse" data-target="#{{$paciente->slug}}">
			 		<li class="alert alert-info">
			 			{{ $paciente->nombres }} {{ $paciente->apellido_pat }} {{ $paciente->apellido_mat }} /{{ $paciente->tipo->code }}	
			 		</li>
			 </a>

			  <div id="{{$paciente->slug}}" class="collapse">

			   {!! Form::open(['route' => ['admin.citas.store', $medico->slug, $date], 'method' => 'POST', 'class' => 'datepickerform']) !!}
						
			<div class="form-group">
				{!! Form::label('fecha', 'Fecha') !!}
				
				{!! Form::text('fecha', fecha_dmy($date), [
					
					'class' => 'form-control',
					'placeholder' => 'Selecciona la fecha', 
					'required',
					'id' => $paciente->id
				]) !!}
			</div>
			<div class="form-group">
				{!! Form::label('horario', 'Horario') !!}
				
				{!! Form::text('horario', null, [
					
					'class' => 'form-control',
					'placeholder' => 'Ingresa un horario', 
					'required'
				]) !!}
			</div>

			{{ Form::hidden('medico_id', $medico->id) }}
			{{ Form::hidden('paciente_id', $paciente->id) }}
			{{ Form::hidden('slug', $medico->slug) }}
						{!! Form::submit('Registrar', ['class' => 'btn btn-success']) !!}
					{!! Form::close() !!}
			  </div>

			@endforeach
			 <hr>
			 <br>

			@endif

			@if(isset($_GET['rfc']))
				 <br>
				 <div class="pull pull-right">
					 <a data-url="{{ route('admin.pacientes.create', [$medico->slug , $date, $_GET['rfc']]) }}" class="load-form-modal fa fa-pencil " data-toggle ="modal" data-target='#form-modal'>
						NUEVO PACIENTE CON RFC: {{strtoupper($_GET['rfc'])}}?
					 </a> 
				 </div>
			 @else
			 <br>
			  <div class="pull pull-right">
				 <a data-url="{{ route('admin.pacientes.create', [$medico->slug , $date, $rfc]) }}" class="load-form-modal fa fa-pencil" data-toggle ="modal" data-target='#form-modal'>
				
					NUEVO PACIENTE CON RFC: {{strtoupper($rfc)}}?
				 </a> 
				</div>
			 @endif

          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@include('partials.form-modal', ['title'=>'Nuevo Paciente'])


@endsection

@section('js')
  <script src="{{ asset('js/script.js') }}"></script>
	@foreach($pacientes as $paciente)
			<script type="text/javascript">
			  $(function() {
			    $( "#{{$paciente->id}}" ).datepicker();
			  });
			 </script>
			 <script>
			$.datepicker.setDefaults($.datepicker.regional['es-MX']);
			$('#{{$paciente->id}}').datepicker({
			    dateFormat: 'dd-mm-yy',
			    changeMonth: true,
			    changeYear: true,
			    firstDay: 1,
			    
			    
			});

			</script> 
	@endforeach
@endsection
@section('nav')
    @include('partials._nav_citas')
@endsection