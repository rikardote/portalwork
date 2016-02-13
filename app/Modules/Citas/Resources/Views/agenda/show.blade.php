@extends('layouts.app_citas')

@section('title', 'Agenda de ')

@section('styles')
	<link rel="stylesheet" href="{{ asset('css/w3.css') }}">
@endsection

@section('content')
 
	@foreach($medicos as $medico)
		<div class="col-md-6 col-md-4">
			<div class="w3-card-12 w3-blue  panel panel-primary">
				<a href="{{ route('admin.citas.show', [$medico->slug, $date]) }}">
						<strong><h5 class="text-center">Dr. {{ $medico->apellido_pat }} {{ $medico->apellido_mat }} {{ $medico->nombres }}</h5></strong>
				</a>
			</div>
		</div>
	@endforeach
		
  

@endsection

