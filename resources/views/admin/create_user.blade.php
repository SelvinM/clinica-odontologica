@extends('layouts.app1')
@section('toggle')
<a href="{{ route('users') }}" class="btn btn-secondary">← Usuarios</a>
@endsection
@section('content')
<div class="container form-sm">
	<form>
		<legend>Registrar nueva cuenta de usuario</legend>
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

			<input name="" class="form-control" placeholder="Numero telefonico" type="text">
		</div>
		<div class="form-group input-group">
			<div class="input-group-prepend">
				<span class="input-group-text"> <i class="fa fa-building"></i> </span>
			</div>
			<select class="form-control">
				<option selected=""> Seleccione el tipo de trabajo</option>
				<option>Odontólogo</option>
				<option>Asistente</option>
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
		<div class="form-group">
			<button type="submit" class="btn btn-primary btn-block"> Crear usuario  </button>
		</div>
	</form>
</div>
@endsection