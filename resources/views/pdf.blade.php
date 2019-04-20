<head>
	<title>Reporte</title>
	<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<h1 style="padding-bottom: 10px; text-align: center; font-size: 25px">Costo total por tipo de producto</h1>
<?php
$costo_total = 0;
?>
@foreach($item_types as $item_type)
<?php
	$costo_tipo = 0;
?>
<div style="padding-bottom: 20px;page-break-after: auto;">
	<h4 style="text-align: center; font-size: 16px">{{$item_type->name}}</h4>
	<table class="table table-striped" style="font-size: 12px;">
		<tr>
			<th>Producto</th>
			<th>Marca</th>
			<th>Lote</th>
			<th>Costo</th>
			<th>Cantidad</th>
		</tr>
		@foreach($items as $item)
		@if($item->item_type->name == $item_type->name)
		<tr>
			<td>{{ $item->name }}</td>
			<td>{{ $item->brand->name }}</td>
			<td>{{ $item->batch }}</td>
			<td>{{ $item->cost }}</td>
			<td>{{ $item->quantity }}</td>
		</tr>
		<?php
			$costo_tipo = $costo_tipo +  ($item->cost * $item->quantity);
			$costo_total = $costo_total + ($item->cost * $item->quantity);
		?>
		@endif
		
		@endforeach
			<p>
				Costo total de los productos del tipo {{ $item_type->name }}: {{ $costo_tipo }}
			</p>
		
	</table>
</div>
@endforeach
<p style="font-size: 11px">-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</p>
<p>Costo total de todos los productos: {{ $costo_total }}</p>