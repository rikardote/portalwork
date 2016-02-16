@if(isset($paciente))
	<?php $estado = 'Actualizar';  ?>
	{!! Form::model($paciente, ['route' => ['citas.pacientes.update', $paciente->id], 'method' => 'PATCH']) !!}
@else
	<?php $estado = 'Registrar';  ?>
	{!! Form::open(['route' => 'citas.pacientes.store', 'method' => 'POST']) !!}
@endif
@include('citas::pacientes.form')

<div align="right">

{!! Form::submit($estado, ['class' => 'btn btn-success']) !!}
</div>
{!! Form::close() !!}

