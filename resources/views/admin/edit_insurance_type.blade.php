@extends('layouts.app1')
@section('toggle')
<a href="{{ route('admin insurance types') }}" class="btn btn-secondary">← Tipos de seguro</a>
@endsection
@section('content')
<div class="container form-sm">
	<table class="table table-striped">
		<tbody>
			<tr>
				<td>
					<form class="well form-horizontal" method="post" action="{{ route('admin update insurance type',$insurance_type->id) }}">
						@csrf
						@method('PUT')
						<legend>Editar tipo de seguro</legend>
						<div class="form-group input-group">
			              <div class="input-group-prepend">
			                <span class="input-group-text"> <i class="fa fa-briefcase"></i> </span>
			              </div>
			              <input name="name" class="form-control" value="{{ $insurance_type->name }}" type="text">
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