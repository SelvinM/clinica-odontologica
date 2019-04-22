@extends('layouts.app1')
@section('toggle')
<a href="{{ route('home') }}" class="btn btn-secondary">← Regresar a inicio</a>
@endsection
@section('content')
<div class="container form-sm">
	<table class="table table-striped">
		<tbody>
			<tr>
				<td>
					<form class="well form-horizontal">
						<fieldset>
							<legend>Mi perfil</legend>
							<label>Nombre: </label>
							<div class="form-group input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"> <i class="fa fa-user"></i> </span>
								</div>
								<input readonly name="name" class="form-control" value="{{ Auth::user()->name }}" type="text" >
							</div>
							<label>Correo electrónico:</label>
							<div class="form-group input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
								</div>
								<input readonly name="" class="form-control" value="{{ Auth::user()->email }}" type="email">
							</div>
							<label>Rol de usuario:</label>
							<div class="form-group input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"> <i class="fa fa-building"></i> </span>
								</div>
								<input readonly name="" class="form-control" value="{{ Auth::user()->role->name }}" type="text">
							</div>
							<div class="form-group">
								<a href="{{ route('edit profile') }}" class="btn btn-primary btn-block"> Editar perfil  </a>
							</div>
						</fieldset>
					</form>
				</td>
			</tr>
		</tbody>
	</table>
</div>
@endsection