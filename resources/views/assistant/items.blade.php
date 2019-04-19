@extends('layouts.app_assistant')
@section('title',config('app.name', 'Laravel'))
@section('bg dashboard link','bg-light')
@section('bg appointments link','bg-light')
@section('bg patients link','bg-light')
@section('bg items link','bg-active')@section('items selected','→')
@section('bg users link','bg-light')
@section('content')
<div class="table-lg center">
	<div class="table-top row">
		<div class="col">
			<a class="btn btn-primary btn-add" href="{{ route('assistant create item') }}"></a>
		</div>
		
		<div class="col">
            <form method="get">
                <input type="text" id="search" name="search" value="{{ isset($search) ? $search : ''}}" placeholder="Buscar..." autofocus="">
                <input type="submit" style="display: none" />
            </form>
        </div>
	</div>
	<div class="table-responsive" >
		<table>
			<thead>
				<tr>
					<th>Producto</th>
					<th>Tipo</th>
					<th>Marca</th>
					<th>Lote</th>
					<th>Costo</th>
					<th>Cantidad</th>
					<th>Descripción</th>
					<th>Fecha agregación</th>
					<th>Fecha compra</th>
					<th>Fecha caducidad</th>
					<th width="60px">Editar</th>
					<th width="60px">Borrar</th>
				</tr>
			</thead>
			<tbody>
				@foreach($items as $item)
					<tr>
						<td>{{ $item->name }}</td>
						<td>{{ $item->item_type->name }}</td>
						<td>{{ $item->brand->name }}</td>
						<td>{{ $item->batch }}</td>
						<td>{{ $item->cost }}</td>
						<td>{{ $item->quantity }}</td>
						<td>{{ $item->description }}</td>
						<td>{{ $item->created_at }}</td>
						<td>@if(isset($item->purchase_date))
								{{date( 'Y-m-d', strtotime($item->purchase_date))}}
							@endif</td>
						<td>@if(isset($item->expiration_date))
								{{date( 'Y-m-d', strtotime($item->expiration_date))}}
							@endif
						</td>
							
						<td>
							<a class="btn-edit btn btn-success" href="{{ route('assistant edit item',$item->id) }}"></a>
						</td>
						<td>
							<form method="post" action="{{ route('assistant destroy item',$item->id) }}">
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