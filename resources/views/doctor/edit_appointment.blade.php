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
					<form class="well form-horizontal" method="post" action="{{ route('doctor update appointment',$appointment->id) }}">
					@csrf
					@method('PUT') 
							<legend>Editar cita</legend>
							<div class="form-group input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"> <i class="fa fa-user"></i> </span>
								</div>
								<input name="name" value="{{$appointment->patient->name}}" disabled="" class="form-control"  type="text">
							</div>
							<div class="form-group input-group">
  								<div class="input-group-prepend">
    								<span class="input-group-text"><i class="fa  fa-info-circle"></i> </span>
  								</div>
  								<textarea class="form-control" name="description" placeholder="Descripcion cita (opcional)"  aria-label="With textarea">{{$appointment->description}}</textarea>
							</div>
							@if($errors->has('description'))
			            		<div class="alert alert-danger">
			                		<span>{{ $errors->first('description') }}</span>
			            		</div>
			            	@endif
							<div class="form-group input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"> <i class="fa fa-calendar"></i> </span>
								</div>
								<input type="datetime-local" name="date" value="{{date( 'Y-m-d\TH:i:s', strtotime($appointment->date))}}" class="form-control">
							</div>
							@if($errors->has('date'))
			            		<div class="alert alert-danger">
			                		<span>{{ $errors->first('date') }}</span>
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