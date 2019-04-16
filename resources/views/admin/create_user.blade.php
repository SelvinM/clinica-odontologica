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
              <input name="name" class="form-control" placeholder="Nombre completo" type="text" autofocus="" value="{{ old('name') }}">
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
              <input name="email" class="form-control" placeholder="Correo" type="email" value="{{ old('email') }}">
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
              <select name="role_id" class="form-control" onchange="showHide(this)">
                <option value="asd" selected=""> Seleccione el rol de usuario</option>
                @foreach($roles as $role)
                <option value="{{ $role->id }}"{{ old('role_id') == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
                @endforeach
              </select>
            </div>
            @if($errors->has('role_id'))
            <div class="alert alert-danger">
              <span>{{ $errors->first('role_id') }}</span>
            </div>
            @endif
            <div id="assigned-doctor-div" style="display: none;">
              <div class="form-group input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"> <i class="fa fa-user-md"></i> </span>
                </div>
                <select name="assigned_doctor_id" class="form-control">
                  <option value="" selected=""> Seleccione el doctor asignado</option>
                  @foreach($doctors as $doctor)
                  <option value="{{ $doctor->id }}"{{ old('assigned_doctor_id') == $doctor->id ? 'selected' : '' }}>{{ $doctor->name }}</option>
                  @endforeach
                </select>
              </div>
              @if($errors->has('assigned_doctor_id'))
              <div class="alert alert-danger">
                <span>{{ $errors->first('assigned_doctor_id') }}</span>
              </div>
              @endif
            </div>
            <div class="form-group input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
              </div>
              <input name="password" value="{{ old('password') }}" class="form-control" placeholder="Crear contraseña" type="password">
            </div>
            
            <div class="form-group input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
              </div>
              <input name="password_confirmed" value="{{ old('password_confirmed') }}" class="form-control" placeholder="Repetir contraseña" type="password">
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

<script>
function showHide(elem) {
if(elem.value == 3) {
document.getElementById('assigned-doctor-div').style.display = 'block';
}else{
document.getElementById('assigned-doctor-div').style.display = 'none';
}
}
</script>
@endsection