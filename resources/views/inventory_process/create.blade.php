@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3>New Maintenance Plan</h3>
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

    <form action="{{route('inventory_process.store')}}" method="post">
      @csrf
      <div class="row">

      <div class="col-md-12">
          <strong>Date Execution:</strong>
          <input type="date" name="date_execution" class="form-control">
      </div>

      <div class="col-md-12">
        <strong>Type Inventory: </strong>
        <select class="form-control" name="id_type_inventory">
          @foreach ($type_inventories as $type_inventory)
            <option value="{{$type_inventory->id}}">{{$type_inventory->type_inventory_name}}</option>
          @endforeach
        </select>
      </div>

        <div class="col-md-12">
          <a href="{{route('inventory_process.index')}}" class="btn btn-sm btn-success">Back</a>
          <button type="submit" class="btn btn-sm btn-primary">Submit</button>
        </div>
      </div>
    </form>

  </div>
@endsection