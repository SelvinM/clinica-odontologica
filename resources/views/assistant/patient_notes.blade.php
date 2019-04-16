@extends('layouts.app1')
@section('toggle')
<a href="{{ route('assistant patients') }}" class="btn btn-secondary">← Pacientes</a>
@endsection
@section('content')
<div class="container form-lg">
	<table class="table table-striped">
		<tbody>
			<tr>
				<td>
					<form class="well form-horizontal">
						<fieldset>
							<legend>Descripción y notas de Enrique Flores</legend>
							<div class="form-group input-group">
								<textarea class="form-control form-textarea" readonly="">hola</textarea>
							</div>
						</fieldset>
					</form>
				</td>
			</tr>
		</tbody>
	</table>
</div>
@endsection