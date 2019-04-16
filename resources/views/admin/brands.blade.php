@extends('layouts.app_admin')
@section('title',config('app.name', 'Laravel'))
@section('bg users link','bg-light')
@section('bg brands link','bg-active')@section('brands selected','→')
@section('bg item types link','bg-light')  
@section('bg procedure types link','bg-light')  
{{-- @section('bg payment methods link','bg-active') @section('payment methods selected','→') --}}
@section('content')
<div class="table-sm center">
	<div class="table-top row">
		<div class="col">
			<a class="btn btn-primary btn-add" href="{{ route('admin create brand') }}"></a>
		</div>
		<div class="col">
            <form method="get">
                <input type="text" id="search" name="search" placeholder="Buscar..." value="{{ isset($search) ? $search : ''}}" autofocus="">
                <input type="submit" style="display: none" />
            </form>
        </div>
	</div>
	<div class="table-responsive table-hover" >
		<table>
			<thead>
				<tr>
					<th width="45px">#</th>
					<th>Marcas</th>
					<th width="60px">Editar</th>
					<th width="60px">Borrar</th>
				</tr>
			</thead>
			<tbody>
				@foreach($brands as $brand)
				<tr>
					<td>{{$loop->iteration}}</td>
					<td>{{$brand->name}}</td>
					<td>
						<a class="btn-edit btn btn-success" href="{{ route('admin edit brand', $brand->id) }}"></a>
					</td>
					<td>
						<form method="post" action="{{route('admin destroy brand', $brand->id)}}">
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