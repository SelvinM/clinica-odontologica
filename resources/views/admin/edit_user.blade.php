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
              <div class="form-group input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                </div>
                <input name="name" class="form-control" value="{{ $user->name }}" type="text">
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
                <input name="email" class="form-control" value="{{ $user->email }}" type="email">
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
                  @foreach($roles as $role)
                  @if($user->role_id == $role->id)
                  <option selected="selected" value="{{ $role->id }}" >{{ $role->name }}</option>
                  @else
                  <option value="{{ $role->id }}" >{{ $role->name }}</option>
                  @endif
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block"> Editar usuario  </button>
              </div>
            </fieldset>
          </form>
        </td>
      </tr>
    </tbody>
  </table>
</div>
@endsection