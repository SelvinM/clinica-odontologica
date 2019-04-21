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
          <form class="well form-horizontal" method="post" action="{{ route('usuarios.update',$user->id) }}">
            @csrf
            @method('PUT')
            <fieldset>
              <legend>Editar cuenta de usuario</legend>
              <label>Nombre completo:</label>
              <div class="form-group input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                </div>
                <input name="name" class="form-control" value="{{ $user->name }}"{{ old('name') == $user->name ? 'selected' : ''  }} type="text" autofocus="">
              </div>
              @if($errors->has('name'))
              <div class="alert alert-danger">
                  <span>{{ $errors->first('name') }}</span>
              </div>
              @endif
              <label>Correo electrónico:</label>
              <div class="form-group input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                </div>
                <input name="email" class="form-control" value="{{ $user->email }}"{{ old('email') == $user->email ? 'selected' : ''  }} type="email">
              </div>
              @if($errors->has('email'))
              <div class="alert alert-danger">
                  <span>{{ $errors->first('email') }}</span>
              </div>
              @endif
              <label>Rol asignado:</label>
              <div class="form-group input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"> <i class="fa fa-building"></i> </span>
                </div>
                <select name="role_id" class="form-control" onchange="showHide(this)">
                  @foreach($roles as $role)
                  @if($user->role_id == $role->id)
                  <option selected="selected" value="{{ $role->id }}" >{{ $role->name }}</option>
                  @else
                  <option value="{{ $role->id }}"{{ old('role_id') == $role->id ? 'selected' : '' }} >{{ $role->name }}</option>
                  @endif
                  @endforeach
                </select>
              </div>
              @if($user->role_id==3)
              <div id="assigned-doctor-div" style="display: block;">
              @else
              <div id="assigned-doctor-div" style="display: none;">
              @endif
              <label>Doctor asignado:</label>
              <div class="form-group input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"> <i class="fa fa-user-md"></i> </span>
                </div>
                <select name="assigned_doctor_id" class="form-control">
                  @foreach($doctors as $doctor)
                  @if($user->assigned_doctor_id == $doctor->id)
                  <option selected="selected" value="{{ $doctor->id }}" >{{ $doctor->name }}</option>
                  @else
                  <option value="{{ $doctor->id }}"{{ old('assigned_doctor_id') == $doctor->id ? 'selected' : '' }} >{{ $doctor->name }}</option>
                  @endif
                  @endforeach
                </select>
              </div>
              @if($errors->has('assigned_doctor_id'))
              <div class="alert alert-danger">
                <span>{{ $errors->first('assigned_doctor_id') }}</span>
              </div>
              @endif
            </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block"> Guardar cambios  </button>
              </div>
            </fieldset>
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