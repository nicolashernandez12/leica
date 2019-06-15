@extends('layouts.app')
@section('content')

  <div class="container">
    <div class="row">
      <div class="col-md-10">
        <h3>Lista de Carreras</h3>
      </div>
      <div class="col-sm-2">
        <a class="btn btn-sm btn-success" href="{{ route('career.create')}}">Agregar Carrera</a>
      </div>
    </div>

    @if ($message = Session::get('success'))
      <div class="alert alert-success">
        <p>{{$message}}</p>
      </div>
    @endif

    <table class="table table-hover table-sm">
      <tr>
        <th width = "50px"><b>ID.</b></th>
        <th width = "300px">Nombre</th>
        <th >Descripcion</th>
        <th width = "200px">Accion</th>
      </tr>

      @foreach ($careers as $career)
        <tr>
          <td><b>{{$career->id}}.</b></td>
          <td>{{$career->career_name}}</td>
          <td>{{$career->description}}</td>
          <td>
          <form action="{{route('career.destroy', $career->id)}}" method="post">
            <a class="btn btn-sm btn-success" href="{{route('career.show',$career->id)}}">Mostrar</a>
            <a class="btn btn-sm btn-warning" href="{{route('career.edit',$career->id)}}">Editar</a>
              @csrf
              @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
            </form>
          </td>
        </tr>
      @endforeach
    </table>

{!! $careers->links() !!}
  </div>
@endsection