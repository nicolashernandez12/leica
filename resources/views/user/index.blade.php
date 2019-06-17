@extends('layouts.master')

@section('dentro_de_master')

  <div class="container">
    <div class="row">
      <div class="col-md-10">
        <h3>Lista de lugares</h3>
      </div>
      <div class="col-sm-2">
        <a class="btn btn-sm btn-success" href="{{ route('user.create')}}">Agregar usuario</a>
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
        <th width = "300px">email</th>
        <th width = "200px">Accion</th>
      </tr>

      @foreach ($users as $user)
        <tr>
          <td><b>{{$user->id}}.</b></td>
          <td>{{$user->email}}</td>
          <td>
          <form action="{{route('user.destroy', $user->id)}}" method="post">
              <a class="btn btn-sm btn-warning" href="{{route('user.edit',$user->id)}}">Cambiar contraseñña</a>
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
            </form>
          </td>
        </tr>
      @endforeach
    </table>
    <div class="col-md-12">
        <a href="{{route('index')}}" class="btn btn-sm btn-success">Atras</a>
      </div>

{!! $users->links() !!}
  </div>
@endsection