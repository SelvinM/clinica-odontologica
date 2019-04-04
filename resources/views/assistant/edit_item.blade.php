@extends('layouts.app1')
@section('toggle')
<a href="{{ route('assistant items') }}" class="btn btn-secondary">← Inventario</a>
@endsection
@section('content')
<div class="container form-sm">
	<table class="table table-striped">
		<tbody>
			<tr>
				<td>
					<form class="well form-horizontal" method="post" action="{{ route('assistant update item',$item->id) }}"> @csrf
						<legend>Registrar nuevo material</legend>
						<div class="form-group input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"> <i class="fa  fa-wrench"></i> </span>
							</div>
							<input name="name" class="form-control" placeholder="Material" value="{{$item->name}}" {{ old('name') == $item->name ? 'selected' : ''  }} type="text">
						</div>
						@if($errors->has('name'))
			            <div class="alert alert-danger">
			                <span>{{ $errors->first('name') }}</span>
			            </div>
			            @endif
						<div class="form-group input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"> <i class="fa  fa-wrench"></i> </span>
							</div>
							<select name="item_type_id"  class="form-control">
									<option selected=""> Seleccione el tipo de material</option>
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
								<option selected=""> Seleccione la marca del material</option>
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
							<input name="price" class="form-control" placeholder="Precio" value="{{$item->price}}" {{ old('price') == $item->price ? 'selected' : ''  }} type="text">
						</div>
						@if($errors->has('price'))
			            <div class="alert alert-danger">
			                <span>{{ $errors->first('price') }}</span>
			            </div>
			            @endif
						<div class="form-group input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"> <i class="fa  fa-dollar-sign"></i> </span>
							</div>
							<input name="cost" class="form-control" placeholder="Costo" value="{{$item->cost}}" {{ old('cost') == $item->cost ? 'selected' : '' }} type="text">
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
							<input name="quantity" class="form-control" placeholder="Cantidad" value="{{$item->quantity}}" type="text" {{ old('quantity') == $item->quantity ? 'selected' : ''  }}>
						</div>
						@if($errors->has('quantity'))
			            <div class="alert alert-danger">
			                <span>{{ $errors->first('quantity') }}</span>
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
							<button type="submit" class="btn btn-primary btn-block">Editar Material</button>
						</div>
					</form>
				</td>
			</tr>
		</tbody>
	</table>
</div>
@endsection