@extends('layouts.app_admin')
@section('title',config('app.name', 'Laravel'))
@section('bg insurance types link','bg-light') 
@section('bg item types link','bg-active')@section('item types selected','→')
@section('bg users link','bg-light')
@section('bg procedure types link','bg-light')
@section('bg payment types link','bg-light')
@section('content')
<div class="table-md center">
	<div class="table-top row">
		<div class="col">

			<a class="btn btn-primary btn-add" href="{{ route('admin create material') }}"></a>
               
		</div>
		<div class="col">
            <form method="get">
                <input type="text" id="search" name="search" placeholder="Buscar..." autofocus="" value="{{ isset($search) ? $search : ''}}">
                <input type="submit" style="display: none" />
            </form>
        </div>
	</div>
	<div class="table-responsive" >
		<table>
			<thead>
				<tr>
					<th>Tipo</th>									
					<th width="60px">Editar</th>
					<th width="60px">Borrar</th>
				</tr>
			</thead>
			<tbody>
				@foreach($items_type as $item_type)
				<tr>
					<td>{{$item_type->name}}</td>
					<td>
						
						<a class="btn-edit btn btn-success" href="{{ route('admin edit material',$item_type->id) }}"></a>
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