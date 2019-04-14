@extends('layouts.app1')
@section('toggle')
<a href="{{ route('admin item types') }}" class="btn btn-secondary">← Tipos de inventario</a>
@endsection
@section('content')
<div class="container form-sm">
	<table class="table table-striped">
		<tbody>
			<tr>
				<td>
					<form class="well form-horizontal" method="get" action="{{route('admin store item type')}}">
						<legend>Nuevo tipo de inventario</legend>
						<div class="form-group input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"> <i class="fa  fa-flask"></i> </span>
							</div>
							<input name="name" class="form-control" placeholder="Ingrese el nombre del tipo de inventario" type="text" autofocus="">
						</div>
						@if($errors->has('name'))
				            <div class="alert alert-danger">
				                <span>{{ $errors->first('name') }}</span>
				            </div>
            			@endif
 						<div class="form-group">
							<button type="submit" class="btn btn-primary btn-block"> Guardar  </button>
						</div>

					</form>
				</td>
			</tr>
		</tbody>
	</table>
</div>
@endsection