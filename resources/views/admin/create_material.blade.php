@extends('layouts.app1')
@section('toggle')
<a href="{{ route('admin materials') }}" class="btn btn-secondary">← Tipos de materiales</a>
@endsection
@section('content')
<div class="container form-sm">
	<table class="table table-striped">
		<tbody>
			<tr>
				<td>
					<form class="well form-horizontal">
						<legend>Nuevo tipo de material</legend>
						<div class="form-group input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"> <i class="fa  fa-flask"></i> </span>
							</div>
							<input name="" class="form-control" placeholder="Ingrese el tipo de material" type="text" autofocus="">
						</div>

 						<div class="form-group">
							<button type="submit" class="btn btn-primary btn-block"> Guardar  </button>
						</div>

					</form>
				</td>
			</tr>
		</tbody>
	</table>
</div>
@endsection