@extends('layouts.app1')
@section('toggle')
<a href="{{route('images',['patient_id'=>Route::current()->parameters['patient_id'] ,'appointment_id'=>Route::current()->parameters['appointment_id']])}}" class="btn btn-secondary">← Imagenes</a>
@endsection
@section('content')

<div class="container form-sm"> 
  <table class="table table-striped">
    <tbody>
      <tr>  
        <td>
          <form class="well form-horizontal" method="POST" role="form" enctype="multipart/form-data"  action="{{ route('images store',['patient_id'=>Route::current()->parameters['patient_id'] ,'appointment_id'=>Route::current()->parameters['appointment_id']]) }}">
              @csrf 
              <legend>Registrar nueva imagen</legend>
              <div class="form-group input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"> <i class="fa  fa-images"></i> </span>
                </div>
                <input name="image" class="form-control"  type="file" >
              </div>
              @if($errors->has('image'))
                <div class="alert alert-danger">
                    <span>{{ $errors->first('image') }}</span>
                </div>
              @endif 
              <div class="form-group input-group">
                
                <input type="hidden" class="form-control" id="description" name="description" placeholder="Descripción imagen (opcional)" ></input>
              </div> 
              @if($errors->has('description'))
                <div class="alert alert-danger">
                    <span>{{ $errors->first('description') }}</span>
                </div>
              @endif       
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
