@extends('layouts.app1')
@section('toggle')
<a href="{{route('images',['patient_id'=>Route::current()->parameters['patient_id'] ,'appointment_id'=>Route::current()->parameters['appointment_id']])}}" class="btn btn-secondary">← Imagenes</a>
@endsection
@section('content')

  @foreach($images as $image)
  <img src="{{ URL::to('/') }}/Expedientes/{{ $image->image }}" class="img-responsive imgs" />
  @endforeach
@endsection
