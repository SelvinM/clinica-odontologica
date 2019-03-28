@extends('layouts.app1')
@section('toggle')
<a href="{{ route('assistant appointments') }}" class="btn btn-secondary">← Citas</a>
@endsection
@section('content')
<div class="container form-sm">
	<table class="table table-striped">
		<tbody>
			<tr>
				<td>
					<form class="well form-horizontal">
						<fieldset>
							<legend>Registrar nueva cita</legend>
							<div class="form-group input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"> <i class="fa fa-user"></i> </span>
								</div>		
								<select class="form-control">
									<option>Odontologo1</option>
									<option>Odontologo2</option>
									<option>Odontologo3</option>
									<option>Odontologo4</option>
								</select>
							</div>
							<div class="form-group input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"> <i class="fa fa-user"></i> </span>
								</div>		
								<select class="form-control" >
									<option>Escoja el paciente</option>
									<option>Enrique Flores</option>
									<option>Mario Molina</option>
									<option>Maria Perez</option>
								</select>
							</div>
							<div class="form-group input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"> <i class="fa fa-calendar"></i> </span>
								</div>
								<input type="datetime-local" name="" class="form-control">
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-primary btn-block"> Crear  </button>
							</div>
						</fieldset>
					</form>
				</td>
			</tr>
		</tbody>
	</table>
</div>
@endsection