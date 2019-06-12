@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3>New software</h3>
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

    <form action="{{route('software.store')}}" method="post">
      @csrf
      <div class="row">
      <div class="col-md-12">
          <strong>Name:</strong>
          <input type="text" name="name_software" class="form-control" placeholder="software name">
        </div>

        <div class="col-md-12">
          <strong>Version:</strong>
          <input type="text" name="version" class="form-control" placeholder="version">
        </div>

        <div class="col-md-12">
          <strong>Type Software: </strong>
          <select class="form-control" name="id_software_type">
            @foreach ($software_types as $software_type)
            <option value="{{$software_type->id}}">{{$software_type->software_type_name}}</option>
            @endforeach
          </select>
        </div>
        <div class="col-md-12">
          <strong>Inventory: </strong>
          <select class="form-control" name="id_inventory">
            @foreach ($inventories as $inventory)
            <option value="{{$inventory->id}}">{{$inventory->activeInput->input_name}}</option>
            @endforeach
          </select>
        </div>

        <div class="col-md-12">
          <strong>Description :</strong>
          <textarea class="form-control" placeholder="description" name="description" rows="8" cols="80"></textarea>
        </div>

        <div class="col-md-12">
          <strong>Observation :</strong>
          <textarea class="form-control" placeholder="Observation" name="observation" rows="8" cols="80"></textarea>
        </div>

        <div class="col-md-12">
          <a href="{{route('software.index')}}" class="btn btn-sm btn-success">Back</a>
          <button type="submit" class="btn btn-sm btn-primary">Submit</button>
        </div>
      </div>
    </form>

  </div>
@endsection