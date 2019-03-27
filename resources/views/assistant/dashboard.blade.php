@extends('layouts.app_assistant')
@section('title',config('app.name', 'Laravel'))
@section('bg dashboard link','bg-active') @section('dashboard selected','→')
@section('bg appointments link','bg-light')
@section('bg patients link','bg-light')
@section('bg items link','bg-light')
@section('bg users link','bg-light')
@section('content')
<div id='calendar'></div>
@endsection
