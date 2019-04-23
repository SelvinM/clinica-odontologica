@extends('layouts.app1')
@section('toggle')
<a href="{{route('doctor patient logs',Route::current()->parameters['patient_id'])}}" class="btn btn-secondary">← Expediente</a>
@endsection
@section('content')

<div class="table-lg center">
  <div class="table-top row">
    <div class="col">
      <a class="btn btn-primary btn-add" href="{{ route('images create',['patient_id'=>Route::current()->parameters['patient_id'] ,'appointment_id'=>Route::current()->parameters['appointment_id']]) }}"></a>
    </div>
  </div>
<div class="table-responsive table-bordered table-striped" >
    <table>
      <thead>
        <tr>
          <th width="30%">Imagen</th>
          <th width="40%">Descripción</th>
          <th width="15%">Ver</th>
          <th width="15%">Borrar</th>
        </tr> 
      </thead>
      <tbody>
        @foreach($images as $image)
          <tr>
            <td><img src="{{ URL::to('/') }}/Expedientes/{{ $image->image }}" class="img-thumbnail" width="105" /></td>
            <td>{{ $image->description }}</td>
            <td>
              <a class="btn btn-success" href="{{ route('images show',['patient_id'=>Route::current()->parameters['patient_id'] ,'appointment_id'=>Route::current()->parameters['appointment_id'],'img_id'=>$image->id]) }}"> <span <i class="fa fa-eye"></span></a>
            </td>
            <td>
              <form method="post" action="{{ route('images destroy',['patient_id'=>Route::current()->parameters['patient_id'] ,'appointment_id'=>$image->id]) }}">
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
