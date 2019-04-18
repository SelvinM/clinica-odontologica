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
					<form method="post" action="{{route('admin update procedure type', $procedure_type->id)}}" class="well form-horizontal">
						@csrf
            			@method('PUT')
						<legend>Editar tipo de procedimiento</legend>
						<label>Tipo de procedimiento:</label>
						<div class="form-group input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"> <i class="fa  fa-money-bill-alt"></i> </span>
							</div>
							<input name="name" class="form-control" placeholder="Ingrese el tipo de procedimiento" type="text" autofocus="" value="{{$procedure_type->name}}"{{ old('name') == $procedure_type->name ? 'selected' : ''  }}>
							
						</div>

						@if($errors->has('name'))
				            <div class="alert alert-danger">
				               	<span>{{ $errors->first('name') }}</span>
				            </div>
            			@endif
            			<label>Descripción(opcional):</label>
            			<div class="form-group input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"> <i class="fa  fa-money-bill-alt"></i> </span>
							</div>
							<input name="description" class="form-control form-textarea" placeholder="Ingrese una descripción (opcional)" type="textfield" autofocus="" value="{{$procedure_type->description}}"{{ old('description') == $procedure_type->description ? 'selected' : ''  }}>
							
						</div>

 						<div class="form-group">
							<button type="submit" class="btn btn-primary btn-block"> Guardar cambios</button>
						</div>

					</form>
				</td>
			</tr>
		</tbody>
	</table>
</div>
@endsection