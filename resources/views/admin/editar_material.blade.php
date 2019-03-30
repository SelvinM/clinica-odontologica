@extends('layouts.app1')
@section('toggle')
<a href="{{ route('admin materials') }}" class="btn btn-secondary">← Materiales</a>
@endsection
@section('content')
<div class="container form-sm">
	<table class="table table-striped">
		<tbody>
			<tr>
				<td>
					<form class="well form-horizontal">
						<legend>Editar material</legend>
						<div class="form-group input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"> <i class="fa  fa-flask"></i> </span>
							</div>
							<input name="" class="form-control" placeholder="Ingrese el nombre del material" type="text">
						</div>
						<div class="form-group input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"> <i class="fa  fa-flask"></i> </span>
							</div>
                            	<select class="form-control">
								<option selected=""> Seleccione el tipo</option>
								<option>Analgesico</option>
								<option>Anestesico</option>
								<option>Antibiotico</option>
								<option>Desinflamatorio</option>
								<option>Desinflamatorio</option>
								<option>Herramienta</option>
							</select>
						</div>

                        <div class="form-group input-group">
							<label class="control-label">Fecha de compra:</label>
						</div>
						<div class="form-group input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"> <i class="fa fa-hourglass-half "></i> </span>
								</div>
								<input type="datetime-local" name="" class="form-control">
						</div>

						<div class="form-group input-group">
							<label class="control-label">Fecha de caducidad:</label>
						</div>
						<div class="form-group input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"> <i class="fa fa-hourglass-half "></i> </span>
								</div>
								<input type="datetime-local" name="" class="form-control">
						</div>

						<div class="form-group input-group">
							<label class="control-label">Cantidad en numeros:</label>
						</div>
						<div class="form-group input-group">
								<div class="input-group-prepend">
									<span class="input-text">  </span>
								</div>
								<input type="input-text" name="" class="form-control">
						</div>


 						<div class="form-group">
							<button type="submit" class="btn btn-primary btn-block"> Guardar cambios  </button>
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