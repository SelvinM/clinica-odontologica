@extends('layouts.app_admin')
@section('title',config('app.name', 'Laravel'))
@section('bg insurance types link','bg-light') 
@section('bg item types link','bg-active')@section('item types selected','→')
@section('bg users link','bg-light')
@section('bg procedure types link','bg-light')
@section('bg payment methods link','bg-light')
@section('content')
<div class="table-md center">
	<div class="table-top row">
		<div class="col">

			<a class="btn btn-primary btn-add" href="{{ route('admin create item type') }}"></a>
               
		</div>
		<div class="col">
            <form method="get">
                <input type="text" id="search" name="search" placeholder="Buscar..." autofocus="" value="{{ isset($search) ? $search : ''}}">
                <input type="submit" style="display: none" />
            </form>
        </div>
	</div>
	<div class="table-responsive table-hover" >
		<table>
			<thead>
				<tr>
					<th width="45px">#</th>
					<th>Tipo</th>									
					<th width="60px">Editar</th>
					<th width="60px">Borrar</th>
				</tr>
			</thead>
			<tbody>
				@foreach($items_types as $item_type)
				<tr>
					<td>{{$loop->iteration}}</td>
					<td>{{$item_type->name}}</td>
					<td>
						
						<a class="btn-edit btn btn-success" href="{{ route('admin edit item type',$item_type->id) }}"></a>
					</td>
					<td>
						<form method="post" action="{{route('admin destroy item type', $item_type->id)}}">
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