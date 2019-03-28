@extends('layouts.app1')
@section('toggle')
<a href="{{ route('doctor create appointment') }}" class="btn btn-secondary">← Agregar cita</a>
@endsection
@section('content')
<div class="container form-lg">
	<table class="table table-striped">
		<tbody>
			<tr>
				<td>
					<form class="well form-horizontal">
						<fieldset>
							<legend>Crear perfil de paciente</legend>
							<div class="form-group input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"> <i class="fa fa-user"></i> </span>
								</div>
								<input name="" class="form-control" placeholder="Nombre completo" type="text">
							</div>
							<div class="form-group input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
								</div>
								<input name="" class="form-control" placeholder="Correo" type="email">
							</div>
							<div class="form-group input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"> <i class="fa fa-phone"></i> </span>
								</div>
								<input name="" class="form-control" placeholder="Número telefónico" type="text">
							</div>
							<div class="form-group input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"> <i class="fa fa-home"></i> </span>
								</div>
								<input name="" class="form-control" placeholder="Dirección (opcional)" type="text">
							</div>
							<div class="form-group input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"> <i class="fa fa-tint"></i> </span>
								</div>
								<select class="form-control" >
									<option>Tipo de sangre</option>
									<option>A+</option>
									<option>A-</option>
									<option>B+</option>
									<option>B-</option>
									<option>O+</option>
									<option>O-</option>
									<option>AB+</option>
									<option>AB-</option>
								</select>
							</div>
							<div class="form-group input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"> <i class="fa fa-plus-circle"></i> </span>
								</div>
								<select class="form-control">
									<option>Tipo de seguro</option>
									<option>Opcion1</option>
									<option>Opcion2</option>
								</select>
							</div>
							<div class="form-group input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"> <i class="fa fa-lock"></i> </span>
								</div>
								<input class="form-control" placeholder="Crear contraseña" type="password">
							</div>
							<div class="form-group input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"> <i class="fa fa-lock"></i> </span>
								</div>
								<input class="form-control" placeholder="Repetir contraseña" type="password">
							</div>
							<div class="form-group input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"> <i class="fa fa-sticky-note"></i> </span>
								</div>
								<textarea class="form-control form-textarea" placeholder="Descripción y apuntes (opcional)"></textarea>
							</div>
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