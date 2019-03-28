@extends('layouts.app1')
@section('sidebar')
<div class="bg-light border-right" id="sidebar-wrapper">
  <div class="sidebar-heading"> <h3 class="{{-- logo --}} text-center">{{ config('app.name', 'Laravel') }}</h3>  </div>
  <div class="list-group list-group-flush">
    <a href="{{ route('home a') }}" class="list-group-item list-group-item-action @yield('bg dashboard link')"> @yield('dashboard selected') Inicio</a>
    <a href="{{ route('appointments a') }}" class="list-group-item list-group-item-action @yield('bg appointments link')"> @yield('appointments selected') Citas</a>
    <a href="{{ route('patients a') }}" class="list-group-item list-group-item-action @yield('bg patients link')">@yield('patients selected') Pacientes</a>
    <a href="{{ route('items a') }}" class="list-group-item list-group-item-action @yield('bg items link')">@yield('items selected') Inventario</a>
  </div>
</div>
@endsection
@section('toggle')
<button class="btn btn-secondary" id="menu-toggle">&#9776;</button>
@endsection