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
					<form class="well form-horizontal" method="post" action="{{ route('assistant store item') }}"> @csrf
						<legend>Registrar nuevo material</legend>
						<div class="form-group input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"> <i class="fa  fa-wrench"></i> </span>
							</div>
							<input name="name" class="form-control" placeholder="Material" value="{{ old('name') }}" type="text">
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
  							<textarea class="form-control" name="description" placeholder="Descripcion (opcional)" aria-label="With textarea">{{ old('description') }}</textarea>
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
									<option selected=""> Seleccione el tipo de material</option>
									@foreach($types_items as $type_item)
										<option value="{{ $type_item->id }}" {{ old('item_type_id') == $type_item->id ? 'selected' : '' }}>{{ $type_item->name }}</option>
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
									<option value="{{ $brand->id }}" {{ old('brand_id') == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
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
							<input name="cost" class="form-control" placeholder="Costo" value="{{ old('cost') }}" type="text">
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
							<input name="quantity" class="form-control" placeholder="Cantidad" value="{{ old('quantity') }}" type="text">
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
							<input name="batch" class="form-control" placeholder="Lote" value="{{ old('batch') }}" type="text">
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
								<input type="date" name="purchase_date" value="{{ old('purchase_date') }}" class="form-control">
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
								<input type="date" name="expiration_date" value="{{ old('expiration_date') }}" class="form-control">
						</div>
						@if($errors->has('expiration_date'))
			            <div class="alert alert-danger">
			                <span>{{ $errors->first('expiration_date') }}</span>
			            </div>
			            @endif
						<div class="form-group">
							<button type="submit" class="btn btn-primary btn-block"> Crear  </button>
						</div>
					</form>
				</td>
			</tr>
		</tbody>
	</table>
</div>
@endsection