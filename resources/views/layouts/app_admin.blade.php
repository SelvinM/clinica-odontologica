@extends('layouts.app1')
@section('sidebar')
<div class="bg-light border-right" id="sidebar-wrapper">
  <div class="sidebar-heading"> <h3 class="{{-- logo --}} text-center">{{ config('app.name', 'Laravel') }}</h3>  </div>
  <div class="list-group list-group-flush">
    <a href="{{ route('home') }}" class="list-group-item list-group-item-action @yield('bg dashboard link')"> @yield('dashboard selected') Usuarios</a>
    <a href="{{ route('admin materials') }}" class="list-group-item list-group-item-action @yield('bg materials link')"> @yield('materials selected') Tipos de materiales</a>
    <a href="{{ route('admin payments') }}" class="list-group-item list-group-item-action @yield('bg payments link')">@yield('payments selected') Tipos de pago</a>
    <a href="{{ route('admin insurances') }}" class="list-group-item list-group-item-action @yield('bg insurances link')">@yield('insurances selected') Tipos de seguro</a>
    <a href="{{ route('admin procedures') }}" class="list-group-item list-group-item-action @yield('bg procedures link')">@yield('procedures selected') Tipos de procedimiento</a>
  </div>
</div>
@endsection
@section('toggle')
<button class="btn btn-secondary" id="menu-toggle">&#9776;</button>
@endsection