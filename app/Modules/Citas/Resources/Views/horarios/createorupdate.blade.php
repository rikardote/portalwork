@if(isset($horario))
	<?php $estado = 'Actualizar';  ?>
	{!! Form::model($horario, ['route' => ['citas.horarios.update', $horario->id], 'method' => 'PATCH']) !!}
@else
	<?php $estado = 'Registrar';  ?>
	{!! Form::open(['route' => 'citas.horarios.store', 'method' => 'POST']) !!}
@endif
     @include('citas::horarios.form')

<div align="right">
     {!! Form::submit($estado, ['class' => 'btn btn-success']) !!}
</div>  
    {!! Form::close() !!}
