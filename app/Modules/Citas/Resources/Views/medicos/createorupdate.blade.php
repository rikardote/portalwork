@if(isset($medico))
	
	<?php $estado = 'Actualizar';  ?>
	{!! Form::model($medico, ['route' => ['citas.medicos.update', $medico->id], 'method' => 'PATCH']) !!}
@else
	<?php $estado = 'Registrar';  ?>
	{!! Form::open(['route' => 'citas.medicos.store', 'method' => 'POST']) !!}
@endif

@include('citas::medicos.form')

<div align="right">
     {!! Form::submit($estado, ['class' => 'btn btn-success']) !!}
</div>
    {!! Form::close() !!}

