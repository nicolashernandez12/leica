@extends('layouts.master')

@section('dentro_de_master')
  <div class="container">
      <div class="col-md-10">
          <h3>{{$place->place_name}}</h3>
            </div>
      <table class="table table-hover table-sm">
          <tr>
            <th width = "50px"><b>ID.</b></th>
            <th width = "300px">Nombre</th>
            <th width = "300px">N° Serie</th>
            <th width = "300px">Modelo</th>
            <th width = "300px">Marca</th>
            <th width = "200px">Accion</th>
          </tr>
    
          @foreach ($inventories as $inventory)
            <tr>
              <td><b>{{$inventory->id}}.</b></td>
              <td>{{$inventory->activeInput->input_name}}</td>
              <td>{{$inventory->serial_number}}</td>
              <td>{{$inventory->activeInput->model->model_name}}</td>
              <td>{{$inventory->activeInput->model->trademark->trademark_name}}</td>
              <td>
              {{-- <form action="{{route('place.destroy', $place->id)}}" method="post">
                <a class="btn btn-sm btn-success" href="{{route('place.show',$place->id)}}">Mostrar</a>
                  <a class="btn btn-sm btn-warning" href="{{route('place.edit',$place->id)}}">Editar</a>
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                </form> --}}
              </td>
            </tr>
          @endforeach
        </table>


    {{-- <div class="row">
      <div class="col-md-12">
        <h3>Detalle</h3>
        <hr>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <strong>Nombre : </strong> {{$place->place_name}}
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <strong>Descripción : </strong> {{$place->description}}
        </div>
      </div>--}}
      <div class="col-md-12">
<<<<<<< HEAD
        <a href="{{route('place.index')}}" class="btn btn-sm btn-success">Atras</a>
      </div> 
=======
        <a href="{{route('place.index')}}" class="btn btn-sm btn-success">Atrás</a>
      </div>
>>>>>>> dba0700bca3ff6d2d1dfdb43ce649c2ce065514d
    </div>
  </div>
@endsection