@extends('layouts.master')

@section('dentro_de_master')
{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3>New Difference Inventory</h3>
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

    <form action="{{route('difference_inventory.store')}}" method="post">
      @csrf
      <div class="row">

      <div class="col-md-12">
          <strong>Difference:</strong>
          <input type="number" name="difference" class="form-control" placeholder="difference">
        </div>

      <div class="col-md-12">
          <strong>Inventory </strong>
          <select class="form-control" name="id_inventory">
            @foreach ($inventories as $inventory)
            <option value="{{$inventory->id}}">{{$inventory->activeInput->input_name}}</option>
            @endforeach
          </select>
      </div>

      <div class="col-md-12">
        <strong>Inventory Process: </strong>
        <select class="form-control" name="id_inventory_process">
          @foreach ($inventory_processes as $inventory_process)
          <option value="{{$inventory_process->id}}">{{$inventory_process->date_execution}}</option>
          @endforeach
        </select>
      </div>
       
      
        <div class="col-md-12">
          <a href="{{route('difference_inventory.index')}}" class="btn btn-sm btn-success">Back</a>
          <button type="submit" class="btn btn-sm btn-primary">Submit</button>
        </div>
      </div>
    </form>

  </div>
@endsection