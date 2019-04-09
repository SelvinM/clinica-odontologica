@extends('layouts.app1')
@section('toggle')
<a href="{{ route('admin procedure types') }}" class="btn btn-secondary">← Tipos de procedimientos</a>
@endsection
@section('content')
<div class="container form-sm">
	<table class="table table-striped">
		<tbody>
			<tr>
				<td>
					<form class="well form-horizontal">
						<legend>Editar tipo de procedimiento</legend>
						<div class="form-group input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"> <i class="fa  fa-wrench"></i> </span>
							</div>
							<input name="" class="form-control" placeholder="Ingrese el codigo de seguro" type="text">
						</div>
						<div class="form-group input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"> <i class="fa  fa-wrench"></i> </span>
							</div>
                            <select class="form-control">
								<option selected=""> Seleccione el tipo</option>
								<option>Apicectomía</option>
								<option>Blanqueamiento dental</option>
								<option>Empaste</option>
								<option>Endodoncia</option>
								<option>Exodoncia</option>
								<option>Explorador dental</option>
								<option>Gingivectomía</option>
								<option>Gingivoplastia</option>
								<option>Higiene bucodental</option>
								<option>Implante dental</option>
								<option>Limpieza dental</option>
								<option>Ostectomía</option>
								<option>Remineralización de los dientes</option>
								<option>Sitio/estado</option>
								<option>Tartrectomía</option>
								<option>Técnica de elevación del colgajo</option>
								<option>Técnica de elevación del seno maxilar</option>
								<option>Técnica de regeneración ósea guiada</option>
								<option>Terapia de fluoruro</option>					
							</select>
						</div>											

 						<div class="form-group">
							<button type="submit" class="btn btn-primary btn-block"> Guardar </button>
						</div>

						<div class="form-group">
							<button type="submit" class="btn btn-primary btn-block"> Cancelar  </button>
						</div>

					</form>
				</td>
			</tr>
		</tbody>
	</table>
</div>
@endsection