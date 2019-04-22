@extends('layouts.app1')
@section('toggle')
<a href="{{ route('doctor appointments') }}" class="btn btn-secondary">← Citas</a>
@endsection
@section('content')
<div class="container form-sm"> 
	<table class="table table-striped">
		<tbody>
			<tr> 
				<td>
					<form class="well form-horizontal" method="post" action="{{ route('doctor store appointment') }}">
							@csrf 
							<legend>Registrar nueva cita</legend>
							<div class="form-group input-group">
  								<a class="btn btn-success btn-block" role="button" href="{{ route('doctor create patient') }}" aria-label="Left Align"><span <i class="fa fa-user-plus"></span> Agregar paciente</a>
  							</div>
  							<h6 class="center">O</h6>
  							<div class="form-group input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"> <i class="fa  fa-search"></i> </span>
								</div>
									<input id="filtro" name="filtro" class="form-control dynamic" data-dependent="patient_id"  placeholder="Filtrar por nombre, dirección, telefono"  type="text" autofocus="">
							</div>
							<div class="form-group">
								<button type="submit" id="buscar"  class="btn btn-info btn-block"> Filtrar pacientes  </button>
							</div>
							<div class="form-group input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"> <i class="fa fa-user"></i> </span>
								</div> 
								<select name="patient_id" id="patient_id" class="form-control" >
									<option value="">Escoja el paciente</option>
									@foreach($patients as $patient)
										@if($errors->has('patient_old'))
			                				<option value="{{ $patient->id }}" {{ $errors->first('patient_old') == $patient->id ? 'selected' : '' }}>{{ $patient->name }}</option>
			                			@else
			                				<option value="{{ $patient->id }}" {{ old('patient_id') == $patient->id ? 'selected' : '' }}>{{ $patient->name }}</option>
			            				@endif
									@endforeach
								</select>
							</div>
							@if($errors->has('patient_id'))
			            		<div class="alert alert-danger">
			                		<span>{{ $errors->first('patient_id') }}</span>
			            		</div>
			            	@endif
							<div class="form-group input-group">
  								<div class="input-group-prepend">
    								<span class="input-group-text"><i class="fa  fa-info-circle"></i> </span>
  								</div>
  								@if($errors->has('description_old'))
			                		<textarea class="form-control" name="description" placeholder="Descripcion cita (opcional)"  aria-label="With textarea"> {{ $errors->first('description_old')}} </textarea>
			                	@else
			                		<textarea class="form-control" name="description" placeholder="Descripcion cita (opcional)"  aria-label="With textarea">{{ old('description') }}</textarea>
			            		@endif
  								
							</div>
							@if($errors->has('description'))
			            		<div class="alert alert-danger">
			                		<span>{{ $errors->first('description') }}</span>
			            		</div>
			            	@endif
							<div class="form-group input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"> <i class="fa fa-calendar"></i> </span>
								</div>
								@if($errors->has('date_old'))
			                			<input type="datetime-local" name="date" value="{{ $errors->first('date_old')}}" class="form-control">
			                	@else
			                		<input type="datetime-local" name="date" value="{{old('date')}}" class="form-control">
			            		@endif
							</div>
							@if($errors->has('date'))
			            		<div class="alert alert-danger">
			                		<span>{{ $errors->first('date') }}</span>
			            		</div>
			            	@endif
			            	@if($errors->has('exist'))
			            		<div class="alert alert-danger">
			                		<span>{{ $errors->first('exist') }}</span>
			            		</div>
			            	@endif
							<div class="form-group">
								<button type="submit" class="btn btn-primary btn-block"> Guardar  </button>
							</div>
							<input id="opc" type="hidden" value="doctor">
					</form>
				</td>
			</tr>
		</tbody>
	</table>
</div>
@endsection