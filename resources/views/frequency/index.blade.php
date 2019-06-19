@extends('layouts.master')

@section('dentro_de_master')

  <div class="container">
    <div class="row">
      <div class="col-md-10">
        <h3>Lista de frecuencia</h3>
      </div>
      <div class="col-sm-2">
        <a class="btn btn-sm btn-success" href="{{ route('frequency.create')}}">Agregar Frecuencia</a>
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
        <th>Descripción</th>
        <th width = "200px">Acción</th>
      </tr>

      @foreach ($frequencies as $frequency)
        <tr>
          <td><b>{{$frequency->id}}.</b></td>
          <td>{{$frequency->frequency_name}}</td>
          <td>{{$frequency->description}}</td>
          <td>
          <form action="{{route('frequency.destroy', $frequency->id)}}" method="post">
            <a class="btn btn-sm btn-success" href="{{route('frequency.show',$frequency->id)}}">Mostrar</a>
              <a class="btn btn-sm btn-warning" href="{{route('frequency.edit',$frequency->id)}}">Editar</a>
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-sm btn-danger">Eliminar </button>
            </form>
          </td>
        </tr>
      @endforeach
    </table>

{!! $frequencies->links() !!}
  </div>
@endsection