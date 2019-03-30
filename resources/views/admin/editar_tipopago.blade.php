@extends('layouts.app1')
@section('toggle')
<a href="{{ route('admin payments') }}" class="btn btn-secondary">← Tipos de pago</a>
@endsection
@section('content')
<div class="container form-sm">
	<table class="table table-striped">
		<tbody>
			<tr>
				<td>
					<form class="well form-horizontal">
						<legend>Editar metodo de pago</legend>
						<div class="form-group input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"> <i class="fa  fa-wrench"></i> </span>
							</div>
							<input name="" class="form-control" placeholder="Ingrese el nuevo codigo de pago" type="text">
						</div>
						<div class="form-group input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"> <i class="fa  fa-wrench"></i> </span>
							</div>
                            <select class="form-control">
								<option selected=""> Seleccione el tipo</option>
								<option>Cheque</option>
								<option>Efectivo</option>
								<option>Tarjeta de debito</option>
								<option>Tarjeta de credito</option>
								<option>A credito</option>
								<option>Moneda nacional</option>
								<option>Moneda extranjera</option>
								
							</select>
						</div>											

 						<div class="form-group">
							<button type="submit" class="btn btn-primary btn-block"> Guardar cambios  </button>
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