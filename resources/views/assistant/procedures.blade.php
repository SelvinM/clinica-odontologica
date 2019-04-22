@extends('layouts.app_assistant')
@section('title',config('app.name', 'Laravel'))
@section('bg dashboard link','bg-light')
@section('bg appointments link','bg-light')
@section('bg patients link','bg-light')
@section('bg items link','bg-light')
@section('bg users link','bg-light')
@section('bg procedures link','bg-active')@section('procedures selected','→')
@section('content')
<div class="table-lg center">
	<div class="table-top row">
		<div class="col">
			<a class="btn btn-primary btn-add" href="{{ route('assistant create procedure') }}"></a>
		</div>
		<div class="col">
			<form method="get">
				<input type="text" id="search" name="search" placeholder="Buscar..." value="{{ isset($search) ? $search : ''}}">
				<input type="submit" style="display: none" />
			</form>
		</div>
	</div>
	<div class="table-responsive" >
		<table>
			<thead>
				<tr>
					<th>Procedimiento</th>
					<th>Paciente</th>
					<th>Fecha de la cita</th>
					<th>Precio</th>
					<th width="60px">Editar</th>
					<th width="60px">Borrar</th>
				</tr>
			</thead>
			<tbody>
				@foreach($procedures as $procedure)
				<tr>
					<td>
						@if($procedure->procedure_type->deleted_at===null)
						{{ $procedure->procedure_type->name }}
						@else
						{{ '<tipo de procedimiento eliminado por administrador>' }}
						@endif
					</td>
					<td>
						@if($procedure->appointment->deleted_at===null && $procedure->appointment->patient->deleted_at===NULL)
						{{ $procedure->appointment->patient->name }}
						@else
						{{ '<cita o paciente eliminado>' }}
						@endif
					</td>
					<td>
						@if($procedure->appointment->patient->deleted_at===NULL)
						{{ $procedure->appointment->date }}
						@else
						{{ '<cita eliminada>' }}
						@endif
					</td>
					<td>{{ $procedure->price }}</td>
					<td>
						<a class="btn-edit btn btn-success" href="{{ route('assistant edit procedure',$procedure->id) }}"></a>
					</td>
					<td>
						<form method="post" action="{{ route('assistant destroy procedure',$procedure->id) }}">
							@csrf
							@method('DELETE')
							<button type="submit" class="btn-delete btn btn-danger"></button>
						</form>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection