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
					<form class="well form-horizontal" method="post" action="{{route('admin store procedure type')}}">
						@csrf
						<legend>Nuevo tipo de procedimiento</legend>
						<div class="form-group input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"> <i class="fa fa-tasks"></i> </span>
							</div>
							<input name="name" class="form-control" placeholder="Ingrese el tipo de procedimiento" type="text">
						</div>
						@if($errors->has('name'))
				            <div class="alert alert-danger">
				                <span>{{ $errors->first('name') }}</span>
				            </div>
            			@endif
            			<div class="form-group input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"> <i class="fa fa-info-circle"></i> </span>
							</div>
							<input name="description" class="form-control form-textarea" placeholder="Ingrese una descripción (opcional)" type="textfield" >
							
						</div>
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