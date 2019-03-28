@extends('layouts.app1')
@section('toggle')
<a href="{{ route('assistant items') }}" class="btn btn-secondary">← Inventario</a>
@endsection
@section('content')
<div class="container form-sm">
	<table class="table table-striped">
		<tbody>
			<tr>
				<td>
					<form class="well form-horizontal">
						<legend>Editar material</legend>
						<div class="form-group input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"> <i class="fa  fa-wrench"></i> </span>
							</div>
							<input name="" class="form-control" value="Anestesia" type="text">
						</div>
						<div class="form-group input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"> <i class="fa  fa-wrench"></i> </span>
							</div>
							<select class="form-control">
								<option selected="">Tipo 1</option>
								<option>Tipo 2</option>
							</select>
						</div>
						<div class="form-group input-group">
							<label class="control-label">Fecha de caducidad:</label>
						</div>
						<div class="form-group input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"> <i class="fa fa-calendar"></i> </span>
								</div>
								<input type="datetime-local" name="" value="2018-06-12T19:30" class="form-control">
						</div>


						<div class="form-group">
							<button type="submit" class="btn btn-primary btn-block"> Editar  </button>
						</div>
					</form>
				</td>
			</tr>
		</tbody>
	</table>
</div>
@endsection