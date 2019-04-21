@extends('layouts.app1')
@section('toggle')
<a href="{{ route('doctor procedures') }}" class="btn btn-secondary">← Inventario</a>
@endsection
@section('content')
<div class="container form-sm">
	<table class="table table-striped">
		<tbody>
			<tr>
				<td>
					<form class="well form-horizontal" method="post" action="{{ route('doctor update procedure',$procedure->id) }}">
						@method('put')
						@csrf
						<legend>Editar procedimiento</legend>
						<label>Tipo de procedimiento:</label>
						<div class="form-group input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"> <i class="fa fa-tasks "></i> </span>
							</div>
							<select name="procedure_type_id"  class="form-control">
								@foreach($procedure_types as $procedure_type)
								@if($procedure_type->id == $procedure->procedure_type_id)
								<option value="{{ $procedure_type->id }}" selected="">{{ $procedure_type->name }}</option>
								@else
								<option value="{{ $procedure_type->id }}" {{ old('procedure_type_id') == $procedure_type->id ? 'selected' : '' }}>{{ $procedure_type->name }}</option>
								@endif
								@endforeach
							</select>
						</div>
						@if($errors->has('procedure_type_id'))
						<div class="alert alert-danger">
							<span>{{ $errors->first('procedure_type_id') }}</span>
						</div>
						@endif
						<label>Cita del procedimiento:</label>
						<div class="form-group input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"> <i class="fa  fa-calendar
								"></i> </span>
							</div>
							<select name="appointment_id"  class="form-control">
								@foreach($appointments as $appointment)
								@if($appointment->id == $procedure->appointment_id)
								<option value="{{ $appointment->id }}" selected="">{{'Paciente: '.$appointment->patient->name.' |'.' Fecha y hora: '.$appointment->date }}</option>
								@else
								<option value="{{ $appointment->id }}" {{ old('appointment_id') == $appointment->id ? 'selected' : '' }}>{{'Paciente: '.$appointment->patient->name.' |'.' Fecha y hora: '.$appointment->date }}</option>
								@endif
								@endforeach
							</select>
						</div>
						@if($errors->has('appointment_id'))
						<div class="alert alert-danger">
							<span>{{ $errors->first('appointment_id') }}</span>
						</div>
						@endif
						<label>Precio:</label>
						<div class="form-group input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"> <i class="fa  fa-dollar-sign"></i> </span>
							</div>
							<input name="price" class="form-control" placeholder="Precio" value="{{ $procedure->price }}"{{ old('price') == $procedure->price ? 'selected' : ''  }} type="text">
						</div>
						@if($errors->has('price'))
						<div class="alert alert-danger">
							<span>{{ $errors->first('price') }}</span>
						</div>
						@endif
						
						<div class="form-group">
							<button type="submit" class="btn btn-primary btn-block"> Guardar cambios</button>
						</div>
					</form>
				</td>
			</tr>
		</tbody>
	</table>
</div>
@endsection