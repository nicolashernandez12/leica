@extends('layouts.master')

@section('dentro_de_master')

  <div class="container">
    <div class="row">
      <div class="col-md-10">
        <h3>Lista de Software</h3>
      </div>
      <div class="col-sm-2">
        <a class="btn btn-sm btn-success" href="{{ route('software.create')}}">Agregar Software</a>
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
        <th>Nombre</th>
        <th>Tipo</th>
        <th>Version</th>
        <th width = "200px">Accion</th>
      </tr>
      
      @foreach ($softwares as $software)
        <tr>
          <td><b>{{$software->id}}.</b></td>
          <td>{{$software->name_software}}</td>
          <td>{{$software->softwareType->software_type_name}}</td>
          <td>{{$software->version}}</td>
          <td>
          <form action="{{route('software.destroy', $software->id)}}" method="post">
            <a class="btn btn-sm btn-success" href="{{route('software.show',$software->id)}}">Mostrar</a>
              <a class="btn btn-sm btn-warning" href="{{route('software.edit',$software->id)}}">Editar</a>
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