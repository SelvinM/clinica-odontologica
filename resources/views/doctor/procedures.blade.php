@extends('layouts.app_doctor')
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
			<a class="btn btn-primary btn-add" href="{{ route('doctor create procedure') }}"></a>
		</div>
		<div class="col">
            <form method="get">
                <input type="text" id="search" name="search" placeholder="Buscar...">
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
						<td>{{ $procedure->procedure_type->name }}</td>
						<td>{{ $procedure->appointment->patient->name }}</td>
						<td>{{ $procedure->appointment->date }}</td>
						<td>{{ $procedure->price }}</td>
						<td>
							<a class="btn-edit btn btn-success" href="{{ route('doctor edit procedure',$procedure->id) }}"></a>
						</td>
						<td>
							<form method="post" action="{{ route('doctor destroy procedure',$procedure->id) }}">
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