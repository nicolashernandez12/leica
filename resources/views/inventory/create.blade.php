@extends('layouts.master')

@section('dentro_de_master')
{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3>Agregar Inventario</h3>
      </div>
    </div>

    @if ($errors->any())
      <div class="alert alert-danger">
        <strong>Whoops! </strong> Hay algun(os) problema(s) con tu(s) entrada(s).<br>
        <ul>
          @foreach ($errors as $error)
            <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{route('inventory.store')}}" method="post">
      @csrf
      <div class="row">

        <div class="col-md-10">
          <strong>Nombre de activo: </strong>
          <select class="form-control" name="id_active_input">
            @foreach ($active_inputs as $active_input)
            <option value="{{$active_input->id}}">{{$active_input->input_name}}</option>
            @endforeach
          </select>
        </div>

        <div class="col-md-2">
          <br>
            <a href="{{route('active_input.create')}}" class="btn btn-sm btn-success form-control">Agregar activo</a>
        </div>

        <div class="col-md-12">
          <strong>Cantidad:</strong>
          <input type="number" name="quantity" class="form-control">
        </div>

        <div class="col-md-12">
          <strong>Observación :</strong>
          <textarea class="form-control" placeholder="observaciones de inventario" name="observation" rows="4" cols="80"></textarea>
        </div>

        <div class="col-md-10">
          <strong>Estado: </strong>
          <select class="form-control" name="id_state">
            @foreach ($states as $state)
            <option value="{{$state->id}}">{{$state->state_name}}</option>
            @endforeach
          </select>
        </div>

        <div class="col-md-2">
          <br>
            <a href="{{route('state.create')}}" class="btn btn-sm btn-success form-control">Agregar estado</a>
        </div>

        <div class="col-md-10">
          <strong>Lugar: </strong>
          <select class="form-control" name="id_place">
            @foreach ($places as $place)
            <option value="{{$place->id}}">{{$place->place_name}}</option>
            @endforeach
          </select>
        </div>

        <div class="col-md-2">
          <br>
            <a href="{{route('place.create')}}" class="btn btn-sm btn-success form-control">Agregar lugar</a>
        </div>

        <div class="col-md-12">
          <a href="{{route('inventory.index')}}" class="btn btn-sm btn-success">Atrás</a>
          <button type="submit" class="btn btn-sm btn-primary">Guardar</button>
        </div>
      </div>
    </form>

  </div>
@endsection