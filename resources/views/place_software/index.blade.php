@extends('layouts.app')
@section('content')

  <div class="container">
    <div class="row">
      <div class="col-md-10">
        <h3>Lista de lugar software</h3>
      </div>
      <div class="col-sm-2">
        <a class="btn btn-sm btn-success" href="{{ route('place_software.create')}}">Agregar lugar software</a>
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
        <th>Lugar</th>
        <th>Software</th>
        <th width = "200px">Accion</th>
      </tr>
      
      @foreach ($place_softwares as $place_software)
        <tr>
          <td><b>{{$place_software->id}}.</b></td>
          <td>{{$place_software->place->place_name}}</td>
          <td>{{$place_software->software->name_software}}</td>
          <td>
          <form action="{{route('place_software.destroy', $place_software->id)}}" method="post">
            <a class="btn btn-sm btn-success" href="{{route('place_software.show',$place_software->id)}}">Mostrar</a>
              <a class="btn btn-sm btn-warning" href="{{route('place_software.edit',$place_software->id)}}">Editar</a>
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
            </form>
          </td>
        </tr>
      @endforeach
    </table>


  </div>
@endsection