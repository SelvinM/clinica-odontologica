@extends('layouts.app_admin')
@section('title',config('app.name', 'Laravel'))
@section('bg payments link','bg-active') @section('payments selected','→')
@section('content')
<div class="table-md center">
	<div class="table-top row">
		<div class="col">
			<a class="btn btn-primary btn-add" href="{{ route('admin añadir_tipodepago') }}"></a>
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
					<th>Codigo</th>
					<th>Tipo de pago</th>
					<th>Descripcion</th>
					<th width="60px">Editar</th>
					<th width="60px">Borrar</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Datos</td>
					<td>Datos</td>
					<td>Datos</td>
					<td>
						<a class="btn-edit btn btn-success" href="{{ route('admin editar_tipopago') }}"></a>
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
					<td>
						<a class="btn-edit btn btn-success" href="{{ route('admin editar_tipopago') }}"></a>
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
					<td>
						<a class="btn-edit btn btn-success" href="{{ route('admin editar_tipopago') }}"></a>
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
					<td>
						<a class="btn-edit btn btn-success" href="{{ route('admin editar_tipopago') }}"></a>
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