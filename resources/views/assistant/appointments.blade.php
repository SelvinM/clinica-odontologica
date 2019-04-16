@extends('layouts.app_assistant')
@section('title',config('app.name', 'Laravel'))
@section('bg dashboard link','bg-light')
@section('bg appointments link','bg-active') @section('appointments selected','→')
@section('bg patients link','bg-light')
@section('bg items link','bg-light')
@section('bg users link','bg-light')
@section('content')
<div class="table-lg center">
	<div class="table-top row"> 
		<div class="col">
			<a class="btn btn-primary btn-add" href="{{ route('assistant create appointment') }}"></a>
		</div>
		<div class="col">
            <form method="get">
                <input type="text" id="search" value="{{ isset($search) ? $search : ''}}" autofocus="" name="search" placeholder="Buscar...">
                <input type="submit" style="display: none" />
            </form>
        </div>
	</div>
	<div class="table-responsive" >
		<table>
			<thead>
				<tr>
					<th>Registrada por</th>
					<th>Paciente</th>
					<th>E-mail del paciente</th>
					<th>Descripción</th>
					<th>Fecha registro</th>
					<th>Fecha cita</th>
					<th width="60px">Editar</th>
					<th width="60px">Borrar</th>
				</tr>
			</thead>
			<tbody>
				@foreach($appointments as $appointment)
					<tr>
						<td>{{$appointment->nameuser}}</td>
						<td>{{$appointment->namepatient}}</td>
						<td>{{$appointment->email}}</td>
						<td>{{$appointment->description}}</td>
						<td>{{$appointment->created_at}}</td>
						<td>{{$appointment->date}}</td>
						<td>
							<a class="btn-edit btn btn-success" href="{{ route('assistant edit appointment',$appointment->id) }}"></a>
						</td>
						<td>
							<form method="post" action="{{ route('assistant destroy appointment',$appointment->id) }}">
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