@extends('layouts.app1')
@section('toggle')
<a href="" class="btn btn-secondary">← Imagenes</a>
@endsection
@section('content')

<div class="table-lg center">
  <div class="table-top row">
    <div class="col">
      <a class="btn btn-primary btn-add" href="{{ route('images create') }}"></a>
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
        <tr>
          <td></td>
          <td>descipcion</td>
          <td>
            <a class="btn-edit btn btn-success" href=""></a>
          </td>
          <td>
            <form method="post" action="">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn-delete btn btn-danger"></button>
            </form>
          </td>
        </tr>
      </tbody>
    </table>
  </div>  
</div>
@endsection
