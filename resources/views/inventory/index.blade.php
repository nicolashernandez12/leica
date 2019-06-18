@extends('layouts.master')

@section('dentro_de_master')

  <div class="container">
    <div class="row">
      <div class="col-md-10">
        <h3>Lista de inventario</h3>
      </div>
      <div class="col-sm-2">
        <a class="btn btn-sm btn-success" href="{{ route('inventory.create')}}">Agregar inventario</a>
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
        <th>Nombre </th>
        <th>Cantidad</th>
        <th>Estado</th>
        <th width = "180px">Acción</th>
      </tr>
      
      @foreach ($inventories as $inventory)
        <tr>
          <td><b>{{$inventory->id}}.</b></td>
          <td>{{$inventory->activeInput->input_name}}</td>
          <td>{{$inventory->quantity}}</td>
          <td>{{$inventory->state->state_name}}</td>
          <td>
          <form action="{{route('inventory.destroy', $inventory->id)}}" method="post">
            <a class="btn btn-sm btn-success" href="{{route('inventory.show',$inventory->id)}}">Mostrar</a>
              <a class="btn btn-sm btn-warning" href="{{route('inventory.edit',$inventory->id)}}">Editar</a>
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