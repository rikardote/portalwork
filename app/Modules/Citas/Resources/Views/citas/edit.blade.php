@if($cita)
	<strong>Paciente: </strong> 
	<br>
	<br>
	{{ $cita->paciente->nombres }} {{ $cita->paciente->apellido_pat }} {{ $cita->paciente->apellido_mat }} /{{$cita->paciente->tipo->code}}
	<br>
	<br>
	{!!  Form::model($cita, ['route' => ['admin.citas.update', $medico->slug, $date, $cita->id], 'method' => 'PATCH']) !!}
		
<div class="form-group">
	{!! Form::label('fecha', 'Fecha') !!}
	
	{!! Form::text('fecha', fecha_dmy($cita->fecha), [
		
		'class' => 'form-control',
		'placeholder' => 'Selecciona la fecha', 
		'required',
		'id' => 'fecha_inicial'
	]) !!}
</div>
<div class="form-group">
	{!! Form::label('horario', 'Horario') !!}
	
	{!! Form::text('horario', null, [
		
		'class' => 'form-control',
		'placeholder' => 'Ingresa un horario', 
		'required'
	]) !!}
</div>

{{ Form::hidden('medico_id', $medico->id) }}
{{ Form::hidden('paciente_id', $cita->paciente->id) }}
{{ Form::hidden('slug', $medico->slug) }}
	 <div align="right">
		{!! Form::submit('Actualizar', ['class' => 'btn btn-success']) !!}
	{!! Form::close() !!}
	</div>

@endif

<script type="text/javascript">
  $(function() {
    $( "#fecha_inicial" ).datepicker();
  });
 </script>
 <script>
$.datepicker.setDefaults($.datepicker.regional['es-MX']);
$('#fecha_inicial').datepicker({
    dateFormat: 'dd-mm-yy',
    changeMonth: true,
    changeYear: true,
    firstDay: 1,
    onClose: function () {
        $('#datepicker_final').val(this.value);
    }
});

