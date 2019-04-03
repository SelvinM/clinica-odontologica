@extends('layouts.app1')
@section('sidebar')
<div class="bg-light border-right" id="sidebar-wrapper">
  <div class="sidebar-heading"> <h3 class="{{-- logo --}} text-center">{{ config('app.name', 'Laravel') }}</h3>  </div>
  <div class="list-group list-group-flush">
    <a href="{{ route('usuarios.index') }}" class="list-group-item list-group-item-action @yield('bg users link')"> @yield('users selected') Usuarios</a>
    <a href="{{ route('admin materials') }}" class="list-group-item list-group-item-action @yield('bg item types link')"> @yield('item types selected') Tipos de materiales</a>
    <a href="{{ route('admin payments') }}" class="list-group-item list-group-item-action @yield('bg payment types link')">@yield('payment types selected') Tipos de pago</a>
    <a href="{{ route('admin insurance types') }}" class="list-group-item list-group-item-action @yield('bg insurance types link')">@yield('insurance types selected') Tipos de seguro</a>
    <a href="{{ route('admin procedures') }}" class="list-group-item list-group-item-action @yield('bg procedure types link')">@yield('procedure types selected') Tipos de procedimiento</a>
  </div>
</div>
@endsection
@section('toggle')
<button class="btn btn-secondary" id="menu-toggle">&#9776;</button>
@endsection