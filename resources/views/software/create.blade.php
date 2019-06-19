@extends('layouts.master')

@section('dentro_de_master')
{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3>Agregar software</h3>
      </div>
    </div>

    @if ($errors->any())
      <div class="alert alert-danger">
        <strong>Whoops! </strong> Hay alguno(s) problema(s) con tu(s) entrada(s).<br>
        <ul>
          @foreach ($errors as $error)
            <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{route('software.store')}}" method="post">
      @csrf
      <div class="row">
      <div class="col-md-12">
          <strong>Nombre:</strong>
          <input type="text" name="name_software" class="form-control" placeholder="Nombre" required="required">
        </div>

        <div class="col-md-12">
          <strong>Versión:</strong>
          <input type="text" name="version" class="form-control" placeholder="versión del software" required="required">
        </div>

        <div class="col-md-12">
          <strong>Tipo de Software: </strong>
          <select class="form-control" name="id_software_type">
            @foreach ($software_types as $software_type)
            <option value="{{$software_type->id}}">{{$software_type->software_type_name}}</option>
            @endforeach
          </select>
        </div>

        <div class="col-md-12">
          <strong>Descripción :</strong>
          <textarea class="form-control" placeholder="descripción del software" name="description" rows="8" cols="80"></textarea>
        </div>

        <div class="col-md-12">
          <strong>Observación :</strong>
          <textarea class="form-control" placeholder="Observación del software" name="observation" rows="8" cols="80"></textarea>
        </div>

        <div class="col-md-12">
          <a href="{{route('software.index')}}" class="btn btn-sm btn-success">Atrás</a>
          <button type="submit" class="btn btn-sm btn-primary">Guardar</button>
        </div>
      </div>
    </form>

  </div>
@endsection