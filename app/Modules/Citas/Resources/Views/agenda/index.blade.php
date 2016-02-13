@extends('layouts.app')

@section('title', 'Agendas Medica')
@section('styles')
	<link rel="stylesheet" href="{{ asset('css/w3.css') }}">
	
@endsection

@section('content')
<section>
    <div class="container spark-screen">
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="panel panel-primary">
            <div class="panel-heading">@yield('title')</div>
            <div class="panel-body">
	            <div class="row">
					@foreach($especialidades as $especialidad)
						<div class="col-md-6 col-md-4">
							<div class="w3-card-8 w3-blue  panel panel-primary">
								<a href="{{ route('citas.agenda.show', $especialidad->slug) }}">
									<h4 class="text-center">{{ $especialidad->name }}</h4>
								</a>
							</div>
						</div>
					@endforeach
				</div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>


@endsection

@section('nav')
    @include('partials._nav_citas')
@endsection
