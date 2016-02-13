@if(isset($horario))
	<?php $estado = 'Actualizar';  ?>
	{!! Form::model($horario, ['route' => ['citas.horarios.update', $horario->id], 'method' => 'PATCH']) !!}
@else
	<?php $estado = 'Registrar';  ?>
	{!! Form::open(['route' => 'citas.horarios.store', 'method' => 'POST']) !!}
@endif
      <div class="form-group">
	{!! Form::label('name', 'Horario') !!}
	
	{!! Form::text('name', null, [
		
		'class' => 'form-control',
		'placeholder' => 'Horario', 
		'required'
	]) !!}
</div>

<div align="right">
     {!! Form::submit($estado, ['class' => 'btn btn-success']) !!}
</div>  
    {!! Form::close() !!}
