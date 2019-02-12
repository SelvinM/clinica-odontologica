@extends('layouts.app_admin')
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
			<a class="btn btn-primary btn-add" href="{{ route('create patient') }}"></a>
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
				<tr>
					<td>Datos</td>
					<td>Datos</td>
					<td>Datos</td>
					<td>Datos</td>
					<td>Datos</td>
					<td>Datos</td>
					<td><a href="{{ route('patient notes') }}">mostrar</a></td>
					<td><a href="{{ route('patient logs') }}">mostrar</a></td>
					<td>
						<a class="btn-edit btn btn-success" href="{{ route('edit patient',1) }}"></a>
					</td>
					<td>
						<form method="post" action="">
							@csrf
							@method('DELETE')
							<button type="submit" class="btn-delete btn btn-danger"></button>
						</form>
					</td>
				</tr>
				<tr>
					<td>Datos</td>
					<td>Datos</td>
					<td>Datos</td>
					<td>Datos</td>
					<td>Datos</td>
					<td>Datos</td>
					<td><a href="{{ route('patient notes') }}">mostrar</a></td>
					<td><a href="{{ route('patient logs') }}">mostrar</a></td>
					<td>
						<a class="btn-edit btn btn-success" href="{{ route('edit patient',1) }}"></a>
					</td>
					<td>
						<form method="post" action="">
							@csrf
							@method('DELETE')
							<button type="submit" class="btn-delete btn btn-danger"></button>
						</form>
					</td>
				</tr>
				<tr>
					<td>Datos</td>
					<td>Datos</td>
					<td>Datos</td>
					<td>Datos</td>
					<td>Datos</td>
					<td>Datos</td>
					<td><a href="{{ route('patient notes') }}">mostrar</a></td>
					<td><a href="{{ route('patient logs') }}">mostrar</a></td>
					<td>
						<a class="btn-edit btn btn-success" href="{{ route('edit patient',1) }}"></a>
					</td>
					<td>
						<form method="post" action="">
							@csrf
							@method('DELETE')
							<button type="submit" class="btn-delete btn btn-danger"></button>
						</form>
					</td>
				</tr>
				<tr>
					<td>Datos</td>
					<td>Datos</td>
					<td>Datos</td>
					<td>Datos</td>
					<td>Datos</td>
					<td>Datos</td>
					<td><a href="{{ route('patient notes') }}">mostrar</a></td>
					<td><a href="{{ route('patient logs') }}">mostrar</a></td>
					<td>
						<a class="btn-edit btn btn-success" href="{{ route('edit patient',1) }}"></a>
					</td>
					<td>
						<form method="post" action="">
							@csrf
							@method('DELETE')
							<button type="submit" class="btn-delete btn btn-danger"></button>
						</form>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
@endsection
