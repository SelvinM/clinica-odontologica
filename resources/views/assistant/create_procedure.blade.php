@extends('layouts.app1')
@section('toggle')
<a href="{{ route('assistant procedures') }}" class="btn btn-secondary">← Procedimientos</a>
@endsection
@section('content')
<div class="container form-sm">
	<table class="table table-striped">
		<tbody>
			<tr>
				<td>
					<form class="well form-horizontal" method="post" action="{{ route('assistant store procedure') }}"> @csrf
						<legend>Registrar nuevo procedimiento</legend>
						<div class="form-group input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"> <i class="fa fa-tasks "></i> </span>
							</div>
							<select name="procedure_type_id"  class="form-control">
								<option selected=""> Seleccione el tipo de procedimiento</option>
								@foreach($procedure_types as $procedure_type)
								<option value="{{ $procedure_type->id }}" {{ old('procedure_type_id') == $procedure_type->id ? 'selected' : '' }}>{{ $procedure_type->name }}</option>
								@endforeach
							</select>
						</div>
						@if($errors->has('procedure_type_id'))
						<div class="alert alert-danger">
							<span>{{ $errors->first('procedure_type_id') }}</span>
						</div>
						@endif
						<div class="form-group input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"> <i class="fa  fa-calendar
								"></i> </span>
							</div>
							<select name="appointment_id"  class="form-control">
								<option selected=""> Seleccione la cita del procedimiento</option>
								@foreach($appointments as $appointment)
								<option value="{{ $appointment->id }}" {{ old('appointment_id') == $appointment->id ? 'selected' : '' }}>{{'Paciente: '.$appointment->patient->name.' Fecha y hora: '.$appointment->date }}</option>
								@endforeach
							</select>
						</div>
						@if($errors->has('appointment_id'))
						<div class="alert alert-danger">
							<span>{{ $errors->first('appointment_id') }}</span>
						</div>
						@endif
						
						<div class="form-group input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"> <i class="fa  fa-dollar-sign"></i> </span>
							</div>
							<input name="price" class="form-control" placeholder="Precio" value="{{ old('price') }}" type="text">
						</div>
						@if($errors->has('price'))
						<div class="alert alert-danger">
							<span>{{ $errors->first('price') }}</span>
						</div>
						@endif
						
						<div class="form-group">
							<button type="submit" class="btn btn-primary btn-block"> Guardar  </button>
						</div>
					</form>
				</td>
			</tr>
		</tbody>
	</table>
</div>
@endsection