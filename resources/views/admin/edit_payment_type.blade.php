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
					<form class="well form-horizontal" method="post" action="{{route('admin update payment method', $payment_method->id)}}">
						@csrf
            			@method('PUT')
						<legend>Editar metodo de pago</legend>
						<div class="form-group input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"> <i class="fa  fa-money-bill-alt"></i> </span>
							</div>
							<input name="name" class="form-control" placeholder="Ingrese el metodo de pago" type="text" autofocus="" value="{{$payment_method->name}}">
							@if($errors->has('name'))
				            	<div class="alert alert-danger">
				                	<span>{{ $errors->first('name') }}</span>
				            	</div>
            				@endif
						</div>
						{{-- <div class="form-group input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"> <i class="fa  fa-money-bill-alt"></i> </span>
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

                        <div class="form-group input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"> <i class="fa fa-sticky-note"></i> </span>
								</div>
								<textarea class="form-control form-textarea" >Agregue una descripcion para el tipo de pago.</textarea>
						</div> --}}


 						<div class="form-group">
							<button type="submit" class="btn btn-primary btn-block"> Finalizar </button>
						</div>
					</form>
				</td>
			</tr>
		</tbody>
	</table>
</div>
@endsection