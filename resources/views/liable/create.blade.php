@extends('layouts.master')

@section('dentro_de_master')

{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3>New liable</h3>
      </div>
    </div>

    @if ($errors->any())
      <div class="alert alert-danger">
        <strong>Whoops! </strong> there where some problems with your input.<br>
        <ul>
          @foreach ($errors as $error)
            <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{route('liable.store')}}" method="post">
      @csrf
      <div class="row">

        <div class="col-md-12">
          <strong>Name:</strong>
          <input type="text" name="name_person" class="form-control" placeholder="Name">
        </div>

        <div class="col-md-12">
            <strong>Last Name:</strong>
            <input type="text" name="last_name_person" class="form-control" placeholder="Last Name">
          </div>

        <div class="col-md-12">
          <strong>RUT:</strong>
          <input type="text" name="rut" class="form-control" placeholder="xxxxxxxx-x">
        </div>

        <div class="col-md-12">
          <strong>Position: </strong>
          <select class="form-control" name="id_position">
            @foreach ($positions as $position)
              <option value="{{$position->id}}">{{$position->position_name}}</option>
            @endforeach
          </select>
        </div>

        <div class="col-md-12">
          <a href="{{route('liable.index')}}" class="btn btn-sm btn-success">Lista responsable</a>
          <a href="{{route('lending.create')}}" class="btn btn-sm btn-success">Agregar prestamo</a>
          <button type="submit" class="btn btn-sm btn-primary">Submit</button>
        </div>
      </div>
    </form>

  </div>
@endsection