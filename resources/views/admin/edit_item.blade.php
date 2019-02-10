@extends('layouts.app1')
@section('toggle')
<a href="{{ route('items') }}" class="btn btn-secondary">← Usuarios</a>
@endsection
@section('content')
<div class="container form-md">
	<form>
		<div class="form-group">
			<label class="control-label">Text</label>
			<input type="text" class="form-control" placeholder="text">
		</div>
		<div class="form-group">
			<label class="control-label">Select</label>
			<select class="form-control">
				<option value="">1</option>
				<option value="">2</option>
			</select>
		</div>
		<div class="form-group">
			<label class="control-label">Datetime</label>
			<input type="datetime-local" class="form-control">
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-primary">Editar</button>
		</div>
	</form>
</div>
@endsection