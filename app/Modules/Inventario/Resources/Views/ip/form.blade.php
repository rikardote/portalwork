<div class="form-group">
	{!! Form::label('ip', 'Ip') !!}
	
	{!! Form::text('ip', $ip, [
		'class' => 'form-control',
		'readonly'=>'true',
		'required']) 
	!!}
</div>
<div class="form-group">
	{!! Form::label('name', 'Empleado') !!}
	
	{!! Form::text('name', null, [
		'class' => 'form-control',
		'required']) 
	!!}
</div>
<div class="form-group">
	{!! Form::label('machine_name', 'Nombre del Equipo') !!}
	
	{!! Form::text('machine_name', null, [
		'class' => 'form-control',
		'required']) 
	!!}
</div>
<div class="form-group">
	<select name="ubicacion_id" class="form-control">
		<option value="1">Sotano</option>
		<option value="2">Bunker</option>
		<option value="3">Mantto</option>
		<option value="4">PB</option>
		<option value="5">Piso 1</option>
		<option value="6">Piso 2</option>
		<option value="7">Piso 3</option>
		<option value="8">Piso 4</option>
		<option value="9">Piso 5</option>
	</select>
</div>