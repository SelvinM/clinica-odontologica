@extends('layouts.app1')
@section('toggle')
<a  class="btn btn-secondary" href="{{ URL::previous() }}">← Regresar</a>
@endsection
@section('content')
<div class="container form-md">
	<table class="table table-striped">
		<tbody>
			<tr>
				<td>
					<form class="well form-horizontal">
						<fieldset>
							<legend>Descripción</legend>
							<div class="form-group input-group">
								<textarea class="form-control form-textarea" readonly="">{{ $description }}</textarea>
							</div>
							
						</fieldset>
					</form>
				</td>
			</tr>
		</tbody>
	</table>
</div>
@endsection