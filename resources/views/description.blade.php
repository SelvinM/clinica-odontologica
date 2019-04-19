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
								<div class="input-group-prepend">
									<span class="input-group-text"> <i class="fa fa-info-circle"></i> </span>
								</div>
								<textarea  rows="10" name="name" disabled="" class="form-control" name="description"   aria-label="With textarea">{{ $description }}</textarea>

							</div>
							
						</fieldset>
					</form>
				</td>
			</tr>
		</tbody>
	</table>
</div>
@endsection