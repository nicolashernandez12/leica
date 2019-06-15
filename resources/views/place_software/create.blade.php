@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3>Agregar lugar software</h3>
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

    <form action="{{route('place_software.store')}}" method="post">
      @csrf
      <div class="row">

      <div class="col-md-12">
          <strong>Lugar </strong>
          <select class="form-control" name="id_place">
            @foreach ($places as $place)
            <option value="{{$place->id}}">{{$place->place_name}}</option>
            @endforeach
          </select>
      </div>

      <div class="col-md-12">
        <strong>Software: </strong>
        <select class="form-control" name="id_software">
          @foreach ($softwares as $software)
          <option value="{{$software->id}}">{{$software->name_software}}</option>
          @endforeach
        </select>
      </div>
       
      
        <div class="col-md-12">
          <a href="{{route('place_software.index')}}" class="btn btn-sm btn-success">Atras</a>
          <button type="submit" class="btn btn-sm btn-primary">Guardar</button>
        </div>
      </div>
    </form>

  </div>
@endsection