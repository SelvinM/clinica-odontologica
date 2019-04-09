@extends('layouts.app_admin')
@section('title',config('app.name', 'Laravel'))
@section('bg insurance types link','bg-active') @section('insurance types selected','→')
@section('bg item types link','bg-light')
@section('bg users link','bg-light')
@section('bg procedure types link','bg-light')
@section('bg payment methods link','bg-light')
@section('content')
<div class="table-md center">
	<div class="table-top row">
		<div class="col">
			<a class="btn btn-primary btn-add" href="{{route('admin create insurance type')}}"></a>
		</div>
		<div class="col">
            <form method="get">
                <input type="text" id="search" name="search" value="{{ isset($search) ? $search : ''}}" placeholder="Buscar...">
                <input type="submit" style="display: none" />
            </form>
        </div>
	</div>
	<div class="table-responsive" >
		<table>
			<thead>
				<tr>
					<th>Nombre</th>

					<th width="60px">Editar</th>
					<th width="60px">Borrar</th>

				</tr>
			</thead>
			<tbody>
			@foreach($insurance_types as $insurance_type)
				<tr>
					<td>{{ $insurance_type->name }}</td>
					<td>
						<a class="btn-edit btn btn-success" href="{{route('admin edit insurance type',$insurance_type->id)}}"></a>
					</td>
					<td>
						<form method="post" action="{{ route('admin destroy insurance type',$insurance_type->id) }}">
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