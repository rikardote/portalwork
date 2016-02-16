@extends('layouts.app')
@section('styles')

	 <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection
@section('content')
	<nav class="floating-menu supreme-container">
	<a style="color: black; background-color: white;" href="{{route('inventario.ip.index')}}">TODAS</a>
	<a style="background-color: red;" href="{{ route('inventario.ip.show', 1) }}">Sotano</a>
	<a style="background-color: orange;" href="{{ route('inventario.ip.show', 2) }}">Bunker</a>
	<a style="background-color: purple;" href="{{ route('inventario.ip.show', 3) }}">Manteniemiento</a>
	<a style="background-color: #3C338D;" href="{{ route('inventario.ip.show', 4) }}">Planta Baja</a>
	<a style="background-color: #3399FF;" href="{{ route('inventario.ip.show', 5) }}">Piso 1</a>
	<a style="background-color: #669999;" href="{{ route('inventario.ip.show', 6) }}">Piso 2</a>
	<a style="background-color: #990066;" href="{{ route('inventario.ip.show', 7) }}">Piso 3</a>
	<a style="background-color: #9999FF;" href="{{ route('inventario.ip.show', 8) }}">Piso 4</a>
	<a style="background-color: #000000;" href="{{ route('inventario.ip.show', 9) }}">Piso 5</a>
	
	</nav>

  	<div class="container supreme-container">
  		<div class="panel-group">
  	
	    <article>
			@for($i=1; $i < 255; $i++)
				{{--*/ $ip = '192.161.59.'.$i /*--}}
				@if(!in_array($ip, $ips))
				

					<a data-url="{{ route('inventario.ip.create', $ip) }}" class="load-form-modal  anchor" data-toggle ="modal" data-target='#form-modal'>
					
					<div align="center" class="panel panel-default shadow">
						<strong>{{$ip}}</strong>
						
					</div>
					
					</a>
				@endif
			@endfor
	    </article>
	    </div>
	</div>



	
	    <div class="container supreme-container">
	        &copy;  {{date('Y')}} ISSSTE BAJA CALIFORNIA
	    </div>
	

	@include('partials.form-modal', ['title'=>'Asignar Ip'])

@endsection

@section('js')
	
	<script src="{{ asset('js/script.js') }}"></script>
@endsection