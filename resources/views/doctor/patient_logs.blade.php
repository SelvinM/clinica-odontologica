@extends('layouts.app1')
@section('toggle')
<a href="{{ route('doctor patients') }}" class="btn btn-secondary">← Pacientes</a>
@endsection
@section('content')
<div class="table-lg center">
	<h2>Expediente de {{ $patient->name }}</h2>
	<br>
	<div class="table-top row">
		<div class="col">
            <form method="get">
                <input type="text" id="search" name="search" placeholder="Buscar...">
                <input type="submit" style="display: none" />
            </form>
        </div>
	</div>
	<div class="table-responsive" >
		<table>
			<thead>
				<tr>
					<th>Fecha y hora</th>
					<th>Imágenes adjuntas</th>
					<th>Apuntes</th>
					<th width="60px">Borrar</th>
				</tr>
			</thead>
			<tbody>	
				@foreach($appointments as $appointment)
				<tr>
					<td>{{ $appointment->date }}</td>
					<td><a href="{{ route('images') }}">mostrar</a></td>
					<td>
						<form action="{{ route('show description') }}" method="GET" id="dates">
							@csrf
								<input type="hidden" name="description"  value="{{ $appointment->description }}">
								<button type="submit" class="btn btn-link">mostrar</button>
							</form>
					</td>
					<td>
						<form method="post" action="{{ route('doctor destroy appointment log',$appointment->id) }}">
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