@extends('layouts.app1')
@section('toggle')
<a href="{{ route('admin insurances') }}" class="btn btn-secondary">← Tipos de seguro</a>
@endsection
@section('content')
<div class="container form-sm">
	<table class="table table-striped">
		<tbody>
			<tr>
				<td>
					<form class="well form-horizontal">
						<legend>Editar tipo de seguro</legend>
						<div class="form-group input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"> <i class="fa  fa-briefcase"></i> </span>
							</div>
							<input name="" class="form-control" placeholder="Ingrese el codigo de seguro" type="text">
						</div>
						<div class="form-group input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"> <i class="fa  fa-briefcase"></i> </span>
							</div>
                            <select class="form-control">
								<option selected=""> Seleccione el tipo</option>
								<option>Publico</option>
								<option>Privado</option>					
							</select>
						</div>											

 						<div class="form-group">
							<button type="submit" class="btn btn-primary btn-block"> Guardar cambios </button>
						</div>

						<div class="form-group">
							<button type="submit" class="btn btn-primary btn-block"> Cancelar cambios  </button>
						</div>

					</form>
				</td>
			</tr>
		</tbody>
	</table>
</div>
@endsection