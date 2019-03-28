@extends('layouts.app1')
@section('toggle')
<a href="{{ route('assistant items') }}" class="btn btn-secondary">← Inventario</a>
@endsection
@section('content')
<div class="container form-sm">
	<table class="table table-striped">
		<tbody>
			<tr>
				<td>
					<form class="well form-horizontal">
						<legend>Registrar nuevo material</legend>
						<div class="form-group input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"> <i class="fa  fa-wrench"></i> </span>
							</div>
							<input name="" class="form-control" placeholder="Material" type="text">
						</div>
						<div class="form-group input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"> <i class="fa  fa-wrench"></i> </span>
							</div>
							<select class="form-control">
								<option selected=""> Seleccione el tipo de material</option>
								<option>Opcion1</option>
								<option>Opcion2</option>
							</select>
						</div>
						<div class="form-group input-group">
							<label class="control-label">Fecha de caducidad:</label>
						</div>
						<div class="form-group input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"> <i class="fa fa-calendar"></i> </span>
								</div>
								<input type="datetime-local" name="" class="form-control">
						</div>


						<div class="form-group">
							<button type="submit" class="btn btn-primary btn-block"> Crear  </button>
						</div>
					</form>
				</td>
			</tr>
		</tbody>
	</table>
</div>
@endsection