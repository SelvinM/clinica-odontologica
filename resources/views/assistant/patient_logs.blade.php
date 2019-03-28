@extends('layouts.app1')
@section('toggle')
<a href="{{ route('patients a') }}" class="btn btn-secondary">← Pacientes</a>
@endsection
@section('content')
<div class="table-md center">
	<h2>Expediente de Enrique Flores</h2>
	<br>
	<div class="table-top row">
		<div class="col">
			<a class="btn btn-primary btn-add" href="{{ route('create patient log a') }}"></a>
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
					<th>Fecha y hora</th>
					<th>Imágenes adjuntas</th>
					<th>Apuntes</th>
					<th width="60px">Editar</th>
					<th width="60px">Borrar</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Datos</td>
					<td><a href="">mostrar</a></td>
					<td><a href="">mostrar</a></td>
					<td>
						<a class="btn-edit btn btn-success" href="{{ route('edit patient log a',1) }}"></a>
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
					<td><a href="">mostrar</a></td>
					<td><a href="">mostrar</a></td>
					<td>
						<a class="btn-edit btn btn-success" href="{{ route('edit patient log a',1) }}"></a>
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
					<td><a href="">mostrar</a></td>
					<td><a href="">mostrar</a></td>
					<td>
						<a class="btn-edit btn btn-success" href="{{ route('edit patient log a',1) }}"></a>
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
					<td><a href="">mostrar</a></td>
					<td><a href="">mostrar</a></td>
					<td>
						<a class="btn-edit btn btn-success" href="{{ route('edit patient log a',1) }}"></a>
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