@extends('layouts.app1')
@section('toggle')
<a href="{{ route('admin brands') }}" class="btn btn-secondary">← Marcas</a>
@endsection
@section('content')
<div class="container form-sm">
	<table class="table table-striped">
		<tbody>
			<tr>
				<td>
					<form method="post" action="{{route('admin store brand')}}" class="well form-horizontal">
						@csrf
						<legend>Crear marca</legend>
						<div class="form-group input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"> <i class="fa  fa-money-bill-alt"></i> </span>
							</div>
							<input name="name" class="form-control" placeholder="Ingrese el nombre de la marca" type="text">
							
						</div>

						@if($errors->has('name'))
				            <div class="alert alert-danger">
				               	<span>{{ $errors->first('name') }}</span>
				            </div>
            			@endif

 						<div class="form-group">
							<button type="submit" class="btn btn-primary btn-block"> Guardar </button>
						</div>

					</form>
				</td>
			</tr>
		</tbody>
	</table>
</div>
@endsection