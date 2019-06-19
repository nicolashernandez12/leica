@extends('layouts.master')

@section('dentro_de_master')

  <div class="container">
    <div class="row">
      <div class="col-md-10">
        <h3>Lista de razón</h3>
      </div>
      <div class="col-sm-2">
        <a class="btn btn-sm btn-success" href="{{ route('reason.create')}}">Agregar Razon</a>
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
<<<<<<< HEAD
        <th width = "200px">Acción</th>
=======
        <th width = "180px">Acción</th>
>>>>>>> dba0700bca3ff6d2d1dfdb43ce649c2ce065514d
      </tr>

      @foreach ($reasons as $reason)
        <tr>
          <td><b>{{++$i}}.</b></td>
          <td>{{$reason->reason_name}}</td>
          <td>{{$reason->description}}</td>
          <td>
          <form action="{{route('reason.destroy', $reason->id)}}" method="post">
            <a class="btn btn-sm btn-success" href="{{route('reason.show',$reason->id)}}">Mostrar</a>
              <a class="btn btn-sm btn-warning" href="{{route('reason.edit',$reason->id)}}">Editar</a>
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
            </form>
          </td>
        </tr>
      @endforeach
    </table>

{!! $reasons->links() !!}
  </div>
@endsection