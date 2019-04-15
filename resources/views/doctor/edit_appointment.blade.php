@extends('layouts.app1')
@section('toggle')
<a href="{{ route('doctor appointments') }}" class="btn btn-secondary">← Citas</a>
@endsection
@section('content')
<div class="container form-sm">
	<table class="table table-striped">
		<tbody>
			<tr>
				<td>
					<form class="well form-horizontal">
					@csrf
					@method('PUT') 
						<fieldset>
							<legend>Editar cita</legend>
							<div class="form-group input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"> <i class="fa fa-user"></i> </span>
								</div>
								<input name="name" class="form-control"  type="text">
							</div>
							<div class="form-group input-group">
  								<div class="input-group-prepend">
    								<span class="input-group-text"><i class="fa  fa-info-circle"></i> </span>
  								</div>
  								<textarea class="form-control" name="description" placeholder="Descripcion cita (opcional)"  aria-label="With textarea">{{ old('description') }}</textarea>
							</div>
							<div class="form-group input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"> <i class="fa fa-calendar"></i> </span>
								</div>
								<input type="datetime-local" name="date" value="2018-06-12T19:30" class="form-control">
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-primary btn-block"> Editar  </button>
							</div>
						</fieldset>
					</form>
				</td>
			</tr>
		</tbody>
	</table>
</div>
@endsection