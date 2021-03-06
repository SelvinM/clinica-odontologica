@extends('layouts.app1')
@section('toggle')
<a href="{{ route('admin item types') }}" class="btn btn-secondary">← Tipos de producto</a>
@endsection
@section('content')
<div class="container form-sm">
	<table class="table table-striped">
		<tbody>
			<tr>
				<td>
					<form class="well form-horizontal" method="post" action="{{route('admin store item type')}}">
						@csrf
						<legend>Nuevo tipo de producto</legend>
						<div class="form-group input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"> <i class="fa  fa-flask"></i> </span>
							</div>
							<input name="name" class="form-control" placeholder="Ingrese el nombre del tipo de producto" type="text" autofocus="" value="{{ old('name') }}">
						</div>
						@if($errors->has('name'))
				            <div class="alert alert-danger">
				                <span>{{ $errors->first('name') }}</span>
				            </div>
            			@endif
            			<div class="form-group input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"> <i class="fa  fa-info-circle"></i> </span>
							</div>
							<input name="description" class="form-control form-textarea" placeholder="Ingrese una descripción (opcional)" type="textfield" autofocus="" value="{{ old('description') }}">
							
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