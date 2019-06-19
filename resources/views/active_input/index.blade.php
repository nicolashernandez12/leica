@extends('layouts.master')

@section('dentro_de_master')

  <div class="container">
    <div class="row">
      <div class="col-md-10">
        <h3>Listas de activos/insumos</h3>
      </div>
      <div class="col-sm-2">
<<<<<<< HEAD
        <a class="btn btn-sm btn-success" href="{{ route('active_input.create')}}">Agregar nuevo articulo</a>
=======
        <a class="btn btn-sm btn-success" href="{{ route('active_input.create')}}">Agregar nuevo activo/insumo</a>
>>>>>>> dba0700bca3ff6d2d1dfdb43ce649c2ce065514d
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
        <th>Valor UF</th>
        <th>Modelo</th>
        <th>Marca</th>
        <th width = "200px">Acción</th>
      </tr>

      @foreach ($active_inputs as $active_input)
        <tr>
          <td><b>{{$active_input->id}}.</b></td>
          <td>{{$active_input->input_name}}</td>
          <td>{{$active_input->uf_value}}</td>
          <td>{{$active_input->model->model_name}}</td>
          <td>{{$active_input->model->trademark->trademark_name}}</td>
          <td>
          <form action="{{route('active_input.destroy', $active_input->id)}}" method="post">
            <a class="btn btn-sm btn-success" href="{{route('active_input.show',$active_input->id)}}">Mostrar</a>
              <a class="btn btn-sm btn-warning" href="{{route('active_input.edit',$active_input->id)}}">Editar</a>
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