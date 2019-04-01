@extends('layouts.app1')
@section('toggle')
<a href="{{ route('usuarios.index') }}" class="btn btn-secondary">← Usuarios</a>
@endsection
@section('content')
<div class="container form-sm">
  <table class="table table-striped">
    <tbody>
      <tr>
        <td>
          <form class="well form-horizontal" method="post" action="{{ route('usuarios.store') }}">
            @csrf
            <legend>Registrar nueva cuenta de usuario</legend>
            <div class="form-group input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-user"></i> </span>
              </div>
              <input name="name" class="form-control" placeholder="Nombre completo" type="text">
            </div>
            @if($errors->has('name'))
            <div class="alert alert-danger">
                <span>{{ $errors->first('name') }}</span>
            </div>
            @endif
            <div class="form-group input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
              </div>
              <input name="email" class="form-control" placeholder="Correo" type="email">
            </div>
            @if($errors->has('email'))
            <div class="alert alert-danger">
                <span>{{ $errors->first('email') }}</span>
            </div>
            @endif
            <div class="form-group input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-building"></i> </span>
              </div>
              <select name="role_id" class="form-control">
                <option value="asd" selected=""> Seleccione el rol de usuario</option>
                @foreach($roles as $role)
                <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
              </select>
            </div>
            @if($errors->has('role_id'))
            <div class="alert alert-danger">
                <span>{{ $errors->first('role_id') }}</span>
            </div>
            @endif
            <div class="form-group input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
              </div>
              <input name="password" class="form-control" placeholder="Crear contraseña" type="password">
            </div>
           
            <div class="form-group input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
              </div>
              <input name="password_confirmed" class="form-control" placeholder="Repetir contraseña" type="password">
            </div>
            @if($errors->has('password'))
            <div class="alert alert-danger">
                <span>{{ $errors->first('password') }}</span>
            </div>
            @endif
            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-block"> Crear usuario  </button>
            </div>
          </form>
        </td>
      </tr>
    </tbody>
  </table>
</div>
@endsection