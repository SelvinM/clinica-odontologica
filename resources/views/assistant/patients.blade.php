@extends('layouts.app_assistant')
@section('title',config('app.name', 'Laravel'))
@section('bg dashboard link','bg-light')
@section('bg appointments link','bg-light')
@section('bg patients link','bg-active')@section('patients selected','→')
@section('bg items link','bg-light')
@section('bg users link','bg-light')
@section('content')
<div class="table-lg center">
	<div class="table-top row">
		<div class="col">
			<a class="btn btn-primary btn-add" href="{{ route('assistant create patient') }}"></a>
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
					<th>Nombre</th>
					<th>E-mail</th>
					<th>Teléfono</th>
					<th>Dirección</th>
					<th>Tipo de seguro</th>
					<th>Tipo de sangre</th>
					<th>Apuntes</th>
					<th>Historial clínico</th>
					<th width="60px">Editar</th>
					<th width="60px">Borrar</th>
				</tr>
			</thead>
			<tbody>
			<?php  
			$patients=DB::table("patients")
					->join('insurance_types','insurance_types.id','patients.insurance_type_id')
					->join('blood_types','blood_types.id','patients.blood_type_id')
					->select('patients.*', 'insurance_types.name AS name_insurance', 'blood_types.name AS name_blood')
					->get()
			?>
			@foreach($patients as $patient)
				<tr>
					<td>{{ $patient->name }}</td>
					<td>{{ $patient->email }}</td>
					<td>{{ $patient->phone }}</td>
					<td>{{ $patient->home_address }}</td>
					<td>{{ $patient->name_insurance}}</td>
					<td>{{ $patient->name_blood}}</td>
					<td><a href="{{ route('assistant patient notes') }}">mostrar</a></td>
					<td><a href="{{ route('assistant patient logs') }}">mostrar</a></td>
					<td>
						<a class="btn-edit btn btn-success" href="{{ route('assistant edit patient',1) }}"></a>
					</td>
					<td>
						<form method="post" action="">
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
