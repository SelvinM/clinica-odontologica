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
					<form class="well form-horizontal" method="post" action="{{route('admin update item type', $item_type->id)}}">
						@csrf
            			@method('PUT')
						<legend>Editar tipo de producto</legend>
						<label>Tipo de producto:</label>
						<div class="form-group input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"> <i class="fa  fa-flask"></i> </span>
							</div>
							<input name="name" class="form-control" value="{{$item_type->name}}"{{ old('name') == $item_type->name ? 'selected' : ''  }} type="text" autofocus="" >
						</div>
						@if($errors->has('name'))
				            <div class="alert alert-danger">
				                <span>{{ $errors->first('name') }}</span>
				            </div>
            			@endif
            			<label>Descripción(opcional):</label>
            			<div class="form-group input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"> <i class="fa fa-info-circle"></i> </span>
							</div>
							<input name="description" class="form-control form-textarea" placeholder="Ingrese una descripción (opcional)" type="textfield" autofocus="" value="{{$item_type->description}}"{{ old('name') == $item_type->description ? 'selected' : ''  }}>
							
						</div>
 						<div class="form-group">
							<button type="submit" class="btn btn-primary btn-block"> Guardar cambios  </button>
						</div>

					</form>
				</td>
			</tr>
		</tbody>
	</table>
</div>
@endsection