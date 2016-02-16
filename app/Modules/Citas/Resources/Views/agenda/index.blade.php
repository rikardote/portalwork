@extends('layouts.app_citas')

@section('title', 'Agendas Medica')
@section('styles')
	<link rel="stylesheet" href="{{ asset('css/w3.css') }}">
	
@endsection

@section('content')

 
	@foreach($especialidades as $especialidad)
		<div class="col-md-6 col-md-4">
			<div class="w3-card-8 w3-blue  panel panel-primary">
				<a href="{{ route('citas.agenda.show', $especialidad->slug) }}">
					<h4 class="text-center">{{ $especialidad->name }}</h4>
				</a>
			</div>
		</div>
	@endforeach

           


@endsection
