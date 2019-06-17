@extends('layouts.master')

@section('dentro_de_master')
{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3>New Inventory</h3>
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

    <form action="{{route('inventory.store')}}" method="post">
      @csrf
      <div class="row">

        <div class="col-md-12">
          <strong>Active Input Name: </strong>
          <select class="form-control" name="id_active_input">
            @foreach ($active_inputs as $active_input)
            <option value="{{$active_input->id}}">{{$active_input->input_name}}</option>
            @endforeach
          </select>
        </div>

        <div class="col-md-12">
          <strong>Quantity:</strong>
          <input type="number" name="quantity" class="form-control">
        </div>

        <div class="col-md-12">
          <strong>Observation :</strong>
          <textarea class="form-control" placeholder="observation" name="observation" rows="4" cols="80"></textarea>
        </div>

        <div class="col-md-12">
          <strong>State: </strong>
          <select class="form-control" name="id_state">
            @foreach ($states as $state)
            <option value="{{$state->id}}">{{$state->state_name}}</option>
            @endforeach
          </select>
        </div>

        <div class="col-md-12">
          <a href="{{route('inventory.index')}}" class="btn btn-sm btn-success">Back</a>
          <button type="submit" class="btn btn-sm btn-primary">Submit</button>
        </div>
      </div>
    </form>

  </div>
@endsection