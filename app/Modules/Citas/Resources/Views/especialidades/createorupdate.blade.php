
@if(isset($especialidad))
	<?php $estado = 'Actualizar';  ?>
	{!! Form::model($especialidad, ['route' => ['citas.especialidades.update', $especialidad->id], 'method' => 'PATCH']) !!}
@else
	<?php $estado = 'Registrar';  ?>
	{!! Form::open(['route' => 'citas.especialidades.store', 'method' => 'POST']) !!}
@endif
     @include('citas::especialidades.form')

  <div align="right">
    {!! Form::submit($estado, ['class' => 'btn btn-success']) !!}
  </div>
    {!! Form::close() !!}

