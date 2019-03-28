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
							<div class="form-group input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"> <i class="fa fa-user"></i> </span>
								</div>
								<input readonly name="name" class="form-control" value="Assistant" type="text" >
							</div>
							<div class="form-group input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
								</div>
								<input readonly name="" class="form-control" value="Assistant@correo.com" type="email">
							</div>
							<div class="form-group input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"> <i class="fa fa-phone"></i> </span>
								</div>
								<input readonly name="" class="form-control" value="97654587" type="text">
							</div>
							<div class="form-group input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"> <i class="fa fa-building"></i> </span>
								</div>
								<input readonly name="" class="form-control" value="Asistente" type="text">
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-primary btn-block"> Editar información  </button>
							</div>
						</fieldset>
					</form>
				</td>
			</tr>
		</tbody>
	</table>
</div>
@endsection