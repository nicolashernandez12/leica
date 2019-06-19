@extends('layouts.master')

@section('dentro_de_master')

  <div class="container" style="padding:1%">
    <div class="row">
      <div class="col-md-10">
        <h3>Lista de prioridad</h3>
      </div>
      <div class="col-sm-2">
        <a class="btn btn-sm btn-success" href="{{ route('priority.create')}}">Agregar Prioridad</a>
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
        <th width = "300px">Nombre</th>
        <th>Descripción</th>
        <th width = "200px">Acción</th>
      </tr>

      @foreach ($priorities as $priority)
        <tr>
          <td><b>{{$priority->id}}.</b></td>
          <td>{{$priority->priority_name}}</td>
          <td>{{$priority->description}}</td>
          <td>
          <form action="{{route('priority.destroy', $priority->id)}}" method="post">
            <a class="btn btn-sm btn-success" href="{{route('priority.show',$priority->id)}}">Mostrar</a>
              <a class="btn btn-sm btn-warning" href="{{route('priority.edit',$priority->id)}}">Editar</a>
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
            </form>
          </td>
        </tr>
      @endforeach
    </table>

{!! $priorities->links() !!}
  </div>
@endsection