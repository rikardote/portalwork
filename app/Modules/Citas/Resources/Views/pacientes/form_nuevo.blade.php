{!! Form::open(['route' => ['admin.pacientes.store', $slug, $date], 'method' => 'POST']) !!}
<div class="form-group">
	{!! Form::label('rfc', 'RFC') !!}
	
	{!! Form::text('rfc', $rfc, [
		
		'class' => 'form-control',
		'placeholder' => 'Ingresar RFC', 
		'required'
	]) !!}

	{!! Form::label('tipo', 'Tipo') !!}
	{!! Form::select('tipo_id', $tipos, null, [
		'class' => 'form-control',
		'placeholder' => 'Selecciona un tipo', 
		'required'
	]) !!}

	{!! Form::label('nombres', 'Nombres') !!}
	
	{!! Form::text('nombres', null, [
		
		'class' => 'form-control',
		'placeholder' => 'Nombres', 
		'required'
	]) !!}

	{!! Form::label('apellido_pat', 'Apellido Paterno') !!}
	
	{!! Form::text('apellido_pat', null, [
		
		'class' => 'form-control',
		'placeholder' => 'Apellido Paterno', 
		'required'
	]) !!}

	{!! Form::label('apellido_mat', 'Apellido Materno') !!}
	
	{!! Form::text('apellido_mat', null, [
		
		'class' => 'form-control',
		'placeholder' => 'Apellido Materno', 
		'required'
	]) !!}
</div>	
<div align="right">
	{!! Form::submit('Agregar', ['class' => 'btn btn-success']) !!}

</div>	
{!!Form::close()!!}

