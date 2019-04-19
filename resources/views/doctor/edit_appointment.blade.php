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
								@if($errors->has('name_old'))
			                		<input name="name" value="{{ $errors->first('name_old')}} " disabled="" class="form-control"  type="text">
			                	@else
			                		<input name="name" value="{{$appointment->patient->name}}" disabled="" class="form-control"  type="text">
			            		@endif
							</div>
							<div class="form-group input-group">
  								<div class="input-group-prepend">
    								<span class="input-group-text"><i class="fa  fa-info-circle"></i> </span>
  								</div>
  								@if($errors->has('description_old'))
			                		<textarea class="form-control" rows="7" name="description" placeholder="Descripcion cita (opcional)"  aria-label="With textarea">{{$errors->first('description_old')}}</textarea>
			                	@else
			                		<textarea class="form-control" rows="7" name="description" placeholder="Descripcion cita (opcional)"  aria-label="With textarea">{{$appointment->description}}</textarea>
			            		@endif
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
								@if($errors->has('date_old'))
			                		<input type="datetime-local" name="date" value="{{date( 'Y-m-d\TH:i:s', strtotime($errors->first('date_old')))}}" class="form-control">
			                	@else
			                		<input type="datetime-local" name="date" value="{{date( 'Y-m-d\TH:i:s', strtotime($appointment->date))}}" class="form-control">
			            		@endif
							</div>
							@if($errors->has('date'))
			            		<div class="alert alert-danger">
			                		<span>{{ $errors->first('date') }}</span>
			            		</div>
			            	@endif
			            	@if($errors->has('exist'))
			            		<div class="alert alert-danger">
			                		<span>{{ $errors->first('exist') }}</span>
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