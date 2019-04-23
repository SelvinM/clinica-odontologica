@extends('layouts.app1')
@section('toggle')
<a href="{{url()->previous()}}" class="btn btn-secondary">← Imagenes</a>
@endsection
@section('content')

  @foreach($images as $image)
  <img src="{{ URL::to('/') }}/Expedientes/{{ $image->image }}" class="img-responsive imgs" />
  @endforeach
@endsection
