@extends('layouts.app1')
@section('toggle')
<a href="{{ route('home') }}" class="btn btn-secondary">← Regresar a inicio</a>
@endsection
@section('content')
<div class="container form-sm">
	<table class="table table-striped">
		<tbody>
			<tr>
				<td>
					<form class="well form-horizontal" method="post" action="{{ route('update profile',Auth::id()) }}">
						@method('PUT')
						@csrf
						<fieldset>
							<legend>Mi perfil</legend>
							<div class="form-group input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"> <i class="fa fa-user"></i> </span>
								</div>
								<input name="name" class="form-control" value="{{ Auth::user()->name }}"{{ old('name') == Auth::user()->name ? 'selected' : ''  }}type="text" >
							</div>
							@if($errors->has('name'))
							<div class="alert alert-danger">
								<span>{{ $errors->first('name') }}</span>
							</div>
							@endif
							<div class="form-group input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
								</div>
								<input name="email" class="form-control" value="{{ Auth::user()->email }}"{{ old('email') == Auth::user()->email ? 'selected' : ''  }} type="email">
							</div>
							@if($errors->has('email'))
							<div class="alert alert-danger">
								<span>{{ $errors->first('email') }}</span>
							</div>
							@endif
							<div class="form-group">
								<button type="submit" class="btn btn-primary btn-block"> Guardar cambios  </button>
							</div>
						</fieldset>
					</form>
				</td>
			</tr>
		</tbody>
	</table>
</div>
@endsection