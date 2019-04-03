@extends('layouts.app1')
@section('toggle')
<a href="{{ route('doctor items') }}" class="btn btn-secondary">← Inventario</a>
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
								<span class="input-group-text"> <i class="fa  fa-wrench"></i> </span>
							</div>
							<input name="material" class="form-control" placeholder="Material" type="text">
						</div>
						<div class="form-group input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"> <i class="fa  fa-wrench"></i> </span>
							</div>
							<select class="form-control">
								<option selected=""> Seleccione el tipo de material</option>
								<option value="2">dsddsd</option>
							</select>
						</div>
						<div class="form-group input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"> <i class="fa  fa-trademark"></i> </span>
							</div>
							<select class="form-control">
								<option selected=""> Seleccione la marca del material</option>
									<option value="4">dvdfd</option>
							</select>
						</div>
						<div class="form-group input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"> <i class="fa  fa-dollar-sign"></i> </span>
							</div>
							<input name="precio" class="form-control" placeholder="Precio" type="text">
						</div>
						<div class="form-group input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"> <i class="fa  fa-dollar-sign"></i> </span>
							</div>
							<input name="costo" class="form-control" placeholder="Costo" type="text">
						</div>
						<div class="form-group input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"> <i class="fa  fa-align-justify"></i> </span>
							</div>
							<input name="cantidad" class="form-control" placeholder="Cantidad" type="text">
						</div>
							<h5>Fecha de caducidad:</h5>
						<div class="form-group input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"> <i class="fa fa-calendar"></i> </span>
								</div>
								<input type="datetime-local" name="" class="form-control">
						</div>


						<div class="form-group">
							<button type="submit" class="btn btn-primary btn-block"> Editar  </button>
						</div>
					</form>
				</td>
			</tr>
		</tbody>
	</table>
</div>
@endsection