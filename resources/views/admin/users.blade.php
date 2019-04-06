@extends('layouts.app_admin')
@section('title',config('app.name', 'Laravel'))
@section('bg insurance types link','bg-light')
@section('bg item types link','bg-light')  
@section('bg users link','bg-active') @section('users selected','→')
@section('bg procedure types link','bg-light') 
@section('bg payment types link','bg-light') 
@section('content')
<div class="table-md center">
	<div class="table-top row">
		<div class="col">
			<a class="btn btn-primary btn-add" href="{{ route('usuarios.create') }}"></a>
		</div>
		<div class="col">
            <form method="get">
                <input type="text" id="search" name="search" value="{{ isset($search) ? $search : ''}}" placeholder="Buscar..." autofocus="">
                <input type="submit" style="display: none" />
            </form>
        </div>
	</div>
	<div class="table-responsive table-hover" >
		<table>
			<thead>
				<tr>
					<th width="45px">#</th>
					<th>Nombre</th>
					<th>Email</th>
					<th>Rol</th>
					<th width="60px">Editar</th>
					<th width="60px">Borrar</th>
				</tr>
			</thead>
			<tbody>
			@foreach($users as $user)
				<tr>
					<td>{{$loop->iteration}}</td>
					<td>{{ $user->name }}</td>
					<td>{{ $user->email }}</td>
					<td>{{ $user->role->name }}</td>
					<td>
						<a class="btn-edit btn btn-success" href="{{route('usuarios.edit',$user->id)}}"></a>
					</td>
					<td>
						<form method="post" action="{{ route('usuarios.destroy',$user->id) }}">
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