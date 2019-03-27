@extends('layouts.app1')
@section('toggle')
<a href="{{ route('patients a') }}" class="btn btn-secondary">← Pacientes</a>
@endsection
@section('content')
<div class="container form-lg">
	<table class="table table-striped">
		<tbody>
			<tr>
				<td>
					<form class="well form-horizontal">
						<fieldset>
							<legend>Editar perfil de paciente</legend>
							<div class="form-group input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"> <i class="fa fa-user"></i> </span>
								</div>
								<input name="" class="form-control" value="Enrique Flores" type="text">
							</div>
							<div class="form-group input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
								</div>
								<input name="" class="form-control" value="enrique@correo.com" type="email">
							</div>
							<div class="form-group input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"> <i class="fa fa-phone"></i> </span>
								</div>
								<input name="" class="form-control" value="99876543" type="text">
							</div>
							<div class="form-group input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"> <i class="fa fa-home"></i> </span>
								</div>
								<input name="" class="form-control" value="Col. 21 de Octubre" type="text">
							</div>
							<div class="form-group input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"> <i class="fa fa-tint"></i> </span>
								</div>
								<select class="form-control">
									<option>Tipo de sangre</option>
									<option selected="">A+</option>
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
									<option selected="">Opcion1</option>
									<option>Opcion2</option>
								</select>
							</div>
							<div class="form-group input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"> <i class="fa fa-sticky-note"></i> </span>
								</div>
								<textarea class="form-control form-textarea" >Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</textarea>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-primary btn-block"> Editar</button>
							</div>
						</fieldset>
					</form>
				</td>
			</tr>
		</tbody>
	</table>
</div>
@endsection