@extends('layouts.master')

@section('dentro_de_master')

  <div class="container">
    <div class="row">
      <div class="col-md-10">
        <h3>Lista de responsable</h3>
      </div>
      <div class="col-sm-2">
        <a class="btn btn-sm btn-success" href="{{ route('liable.create')}}">Agregar responsable</a>
      </div>
    </div>

    @if ($message = Session::get('success'))
      <div class="alert alert-success">
        <p>{{$message}}</p>
      </div>
    @endif

    <table class="table table-hover table-sm">
      <tr>
        <th width = "50px"><b>Id.</b></th>
        <th>Nombre</th>
        <th>apellido paterno</th>
        <th>RUT</th>
        <th>Cargo</th>
        <th width = "200px">Acción</th>
      </tr>
      
      @foreach ($liables as $liable)
        <tr>
          <td><b>{{$liable->id}}.</b></td>
          <td>{{$liable->name_person}}</td>
          <td>{{$liable->last_name_person}}</td>
          <td>{{$liable->rut}}</td>
          <td>{{$liable->position->position_name}}</td>
          <td>
          <form action="{{route('liable.destroy', $liable->id)}}" method="post">
            <a class="btn btn-sm btn-success" href="{{route('liable.show',$liable->id)}}">Mostrar</a>
              <a class="btn btn-sm btn-warning" href="{{route('liable.edit',$liable->id)}}">Editar</a>
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