@extends('layouts.master')

@section('dentro_de_master')

  <div class="container">
    <div class="row">
      <div class="col-md-10">
        <h3>Lista de estado</h3>
      </div>
      <div class="col-sm-2">
        <a class="btn btn-sm btn-success" href="{{ route('state.create')}}">Agregar Estado</a>
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
        <th width = "180px">Acción</th>
      </tr>

      @foreach ($states as $state)
        <tr>
          <td><b>{{++$i}}.</b></td>
          <td>{{$state->state_name}}</td>
          <td>{{$state->description}}</td>
          <td>
          <form action="{{route('state.destroy', $state->id)}}" method="post">
            <a class="btn btn-sm btn-success" href="{{route('state.show',$state->id)}}">Mostrar</a>
              <a class="btn btn-sm btn-warning" href="{{route('state.edit',$state->id)}}">Editar</a>
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
            </form>
          </td>
        </tr>
      @endforeach
    </table>

{!! $states->links() !!}
  </div>
@endsection