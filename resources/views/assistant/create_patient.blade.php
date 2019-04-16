@extends('layouts.app1')
@section('toggle')
<a href="{{ route('assistant patients') }}" class="btn btn-secondary">← Pacientes</a>
@endsection
@section('content')
<div class="container form-lg">
	<table class="table table-striped">
		<tbody>
			<tr>
				<td>
					<form class="well form-horizontal"method="post" action="{{ route('assistant store patient') }}"> @csrf
						<fieldset>
							<legend>Crear perfil de paciente</legend>
							<input name="id_doctor" class="form-control" value="{{$id_doctor->assigned_doctor}}{{ old('id_doctor') }}" type="hidden">
							<div class="form-group input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"> <i class="fa fa-user"></i> </span>
								</div>
								<input name="name" class="form-control" placeholder="Nombre completo" value="{{ old('name') }}" type="text">
							</div>
							@if($errors->has('name'))
			            		<div class="alert alert-danger">
			                		<span>{{ $errors->first('name') }}</span>
			           			</div>
			            	@endif
							<div class="form-group input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
								</div>
								<input name="email" class="form-control" placeholder="Correo" value="{{ old('email') }}" type="email">
							</div>
							@if($errors->has('email'))
			            		<div class="alert alert-danger">
			                		<span>{{ $errors->first('email') }}</span>
			            		</div>
			           		@endif
							<div class="form-group input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"> <i class="fa fa-phone"></i> </span>
								</div>
								<input name="phone" class="form-control" placeholder="Número telefónico" value="{{ old('phone') }}" type="text">
							</div>
							@if($errors->has('phone'))
			            		<div class="alert alert-danger">
			                		<span>{{ $errors->first('phone') }}</span>
			            		</div>
			           		@endif
			           		<div class="form-group input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"> <i class="fa fa-calendar"></i> </span>
								</div>
								<input name="birthdate" class="form-control" placeholder="Fecha de nacimiento" value="{{ old('birthdate') }}" type="date">
							</div>
							@if($errors->has('birthdate'))
			            		<div class="alert alert-danger">
			                		<span>{{ $errors->first('birthdate') }}</span>
			            		</div>
			           		@endif
							<div class="form-group input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"> <i class="fa fa-home"></i> </span>
								</div>
								<input name="home_address" class="form-control" placeholder="Dirección" value="{{ old('home_address') }}" type="text">
							</div>
							@if($errors->has('home_address'))
			            		<div class="alert alert-danger">
			                		<span>{{ $errors->first('home_address') }}</span>
			            		</div>
			           		@endif
							<div class="form-group input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"> <i class="fa fa-tint"></i> </span>
								</div>
								<select  name="blood_type_id"  class="form-control">
									<option selected="">Seleccione el tipo de sangre</option>
									@foreach($blood_types as $blood_type)
										<option value="{{ $blood_type->id }}" {{ old('blood_type_id') == $blood_type->id ? 'selected' : '' }}>{{ $blood_type->name }}</option>
     								@endforeach
								</select>
							</div>
							@if($errors->has('blood_type_id'))
			            		<div class="alert alert-danger">
			                		<span>{{ $errors->first('blood_type_id') }}</span>
			            		</div>
			           		@endif
							<div class="form-group input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"> <i class="fa fa-tint"></i> </span>
								</div>
								<select  name="gender_id"  class="form-control">
									<option selected="">Seleccione el tipo de genero</option>
									@foreach($genders as $gender)
										<option value="{{ $gender->id }}" {{ old('gender_id') == $gender->id ? 'selected' : '' }}>{{ $gender->name }}</option>
     								@endforeach
								</select>
							</div>
							@if($errors->has('gender_id'))
			            		<div class="alert alert-danger">
			                		<span>{{ $errors->first('gender_id') }}</span>
			            		</div>
			           		@endif
							<div class="form-group input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"> <i class="fa fa-sticky-note"></i> </span>
								</div>
								<textarea name="description" class="form-control form-textarea" placeholder="Ingrese una descripcion">{{ old('description') }}</textarea>
							</div>
							@if($errors->has('description'))
			            		<div class="alert alert-danger">
			                		<span>{{ $errors->first('description') }}</span>
			            		</div>
			           		@endif
							<div class="form-group">
								<button type="submit" class="btn btn-primary btn-block"> Crear  </button>
							</div>
						</fieldset>
					</form>
				</td>
			</tr>
		</tbody>
	</table>
</div>
@endsection