@extends('layouts.app1')
@section('toggle')
<a href="{{ route('admin materials') }}" class="btn btn-secondary">← Tipos de materiales</a>
@endsection
@section('content')
<div class="container form-sm">
	<table class="table table-striped">
		<tbody>
			<tr>
				<td>
					<form class="well form-horizontal" method="post" action="{{route('admin update material type', $item_type->id)}}">
						@csrf
            			@method('PUT')
						<legend>Editar tipo de material</legend>
						<div class="form-group input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"> <i class="fa  fa-flask"></i> </span>
							</div>
							<input name="name" class="form-control" value="{{$item_type->name}}" type="text" autofocus="">
						</div>
						@if($errors->has('name'))
				            <div class="alert alert-danger">
				                <span>{{ $errors->first('name') }}</span>
				            </div>
            			@endif
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