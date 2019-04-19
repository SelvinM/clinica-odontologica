@extends('layouts.app1')
@section('toggle')
<a href="{{ route('doctor items') }}" class="btn btn-secondary">← Inventario</a>
@endsection
@section('content')
<div class="container form-sm">
	<table class="table table-striped">
		<tbody>
			<tr>
				<td>
					<form class="well form-horizontal" method="post" action="{{ route('doctor update item',$item->id) }}"> 
					@csrf
					@method('PUT') 
						<legend>Editar producto</legend>
						<div class="form-group input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"> <i class="fa  fa-wrench"></i> </span>
							</div>
							<input name="name" class="form-control" placeholder="Nombre del producto" value="{{$item->name}}" type="text">
						</div>
						@if($errors->has('name'))
			            <div class="alert alert-danger">
			                <span>{{ $errors->first('name') }}</span>
			            </div>
			            @endif
			            <div class="form-group input-group">
  							<div class="input-group-prepend">
    							<span class="input-group-text"><i class="fa  fa-info-circle"></i> </span>
  							</div>
  							<textarea class="form-control" name="description" placeholder="Descripcion (opcional)" aria-label="With textarea">{{$item->description}}</textarea>
						</div>
						@if($errors->has('description'))
			            <div class="alert alert-danger">
			                <span>{{ $errors->first('description') }}</span>
			            </div>
			            @endif
						<div class="form-group input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"> <i class="fa  fa-wrench"></i> </span>
							</div>
							<select name="item_type_id"  class="form-control">
									<option selected=""> Seleccione el tipo de producto</option>
									@foreach($types_items as $type_item)
										@if($type_item->id == $item->item_type_id)
										 	<option value="{{ $type_item->id }}" selected=''>{{ $type_item->name }}</option>
										@else
											<option value="{{ $type_item->id }}" {{ old('item_type_id') == $item->item_type_id ? 'selected' : '' }}>{{ $type_item->name }}</option>
										@endif
     								@endforeach
							</select>
						</div>
						@if($errors->has('item_type_id'))
			            <div class="alert alert-danger">
			                <span>{{ $errors->first('item_type_id') }}</span>
			            </div>
			            @endif
						<div class="form-group input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"> <i class="fa  fa-trademark"></i> </span>
							</div>
							<select name="brand_id"  class="form-control">
								<option selected=""> Seleccione la marca del producto</option>
								@foreach($brands as $brand)
									@if($brand->id == $item->brand_id)
										 	<option value="{{ $brand->id }}" selected="">{{ $brand->name }}</option>
										@else
											<option value="{{ $brand->id }}" {{ old('brand_id') == $item->brand_id ? 'selected' : '' }}>{{ $brand->name }}</option>
										@endif
								@endforeach
							</select>
						</div>
						@if($errors->has('brand_id'))
			            <div class="alert alert-danger">
			                <span>{{ $errors->first('brand_id') }}</span>
			            </div>
			            @endif
						<div class="form-group input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"> <i class="fa  fa-dollar-sign"></i> </span>
							</div>
							<input name="cost" class="form-control" placeholder="Costo" value="{{$item->cost}}"  type="text">
						</div>
						@if($errors->has('cost'))
			            <div class="alert alert-danger">
			                <span>{{ $errors->first('cost') }}</span>
			            </div>
			            @endif
						<div class="form-group input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"> <i class="fa  fa-align-justify"></i> </span>
							</div>
							<input name="quantity" class="form-control" placeholder="Cantidad" value="{{$item->quantity}}" type="text" >
						</div>
						@if($errors->has('quantity'))
			            <div class="alert alert-danger">
			                <span>{{ $errors->first('quantity') }}</span>
			            </div>
			            @endif
			            <div class="form-group input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"> <i class="fa  fa-lock"></i> </span>
							</div>
							<input name="batch" class="form-control" placeholder="Lote" value="{{$item->batch}}" type="text">
						</div>
						@if($errors->has('batch'))
			            <div class="alert alert-danger">
			                <span>{{ $errors->first('batch') }}</span>
			            </div>
			            @endif
			            <h5>Fecha de compra:</h5>
						<div class="form-group input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"> <i class="fa fa-calendar"></i> </span>
								</div>
								@if(isset($item->purchase_date))
									<input type="date" name="purchase_date" value="{{date( 'Y-m-d', strtotime($item->purchase_date))}}" class="form-control">
								@else
									<input type="date" name="purchase_date" value="" class="form-control">
								@endif
								
						</div>
						@if($errors->has('purchase_date'))
			            <div class="alert alert-danger">
			                <span>{{ $errors->first('purchase_date') }}</span>
			            </div>
			            @endif
							<h5>Fecha de caducidad:</h5>
						<div class="form-group input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"> <i class="fa fa-calendar"></i> </span>
								</div>
								@if(isset($item->expiration_date))
									<input type="date" name="expiration_date" value="{{date( 'Y-m-d', strtotime($item->expiration_date))}}" class="form-control">
								@else
									<input type="date" name="expiration_date" value="" class="form-control">
								@endif
								
						</div>
						@if($errors->has('expiration_date'))
			            <div class="alert alert-danger">
			                <span>{{ $errors->first('expiration_date') }}</span>
			            </div>
			            @endif
						<div class="form-group">
							<button type="submit" class="btn btn-primary btn-block">Guardar cambios</button>
						</div>
					</form>
				</td>
			</tr>
		</tbody>
	</table>
</div>
@endsection