@extends('layouts.app1')
@section('toggle')
<a href="" class="btn btn-secondary">← Imagenes</a>
@endsection
@section('content')

<div class="container form-sm"> 
  <table class="table table-striped">
    <tbody>
      <tr> 
        <td>
          <form class="well form-horizontal" enctype="multipart/form-data" method="post" action="{{ route('images store') }}">
              @csrf 
              <legend>Registrar nueva imagen</legend>
              <div class="form-group input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"> <i class="fa  fa-images"></i> </span>
                </div>
                <input name="imagen" class="form-control"  type="file" >
              </div>
              <div class="form-group input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"> <i class="fa  fa-info-circle"></i> </span>
                </div> 
                <textarea class="form-control" name="description" placeholder="Descripción imagen (opcional)"  aria-label="With textarea">{{ old('description') }}</textarea>
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
