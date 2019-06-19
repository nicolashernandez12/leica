@extends('layouts.master')

@section('dentro_de_master')
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3>Edit Inventory</h3>
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

    <form action="{{route('inventory.update',$inventory->id)}}" method="post">
      @csrf
      @method('PUT')
      <div class="row">

          <div class="col-md-12">
              <strong>Active Input: </strong>
              <select class="form-control" name="id_active_input">
                <option selected value="{{$inventory->activeInput->id}}">{{$inventory->activeInput->input_name}}</option>
                  @foreach ($active_inputs as $active_input)
                <option value="{{$active_input->id}}">{{$active_input->input_name}}</option>
                  @endforeach
              </select>
          </div>

          <div class="col-md-12">
            <strong>Numero de serie:</strong>
            <input type="text" name="serial_number" class="form-control" required="required" value="{{$inventory->serial_number}}">
        </div>

          <div class="col-md-12">
              <strong>Quantity:</strong>
              <input type="number" name="quantity" class="form-control" value="{{$inventory->quantity}}">
          </div>
          
          <div class="col-md-12">
            <strong>State: </strong>
            <select class="form-control" name="id_state">
              <option selected value="{{$inventory->state->id}}">{{$inventory->state->state_name}}</option>
                @foreach ($states as $state)
              <option value="{{$state->id}}">{{$state->state_name}}</option>
                @endforeach
            </select>
          </div>

          <div class="col-md-12">
            <strong>Lugar: </strong>
            <select class="form-control" name="id_place">
              <option selected value="{{$inventory->place->id}}">{{$inventory->place->place_name}}</option>
                @foreach ($places as $place)
              <option value="{{$place->id}}">{{$place->place_name}}</option>
                @endforeach
            </select>
          </div>
          
          <div class="col-md-12">
          <strong>Observation :</strong>
          <textarea class="form-control" name="observation" rows="8" cols="80">{{$inventory->observation}}</textarea>
        </div>

        <div class="col-md-12">
          <a href="{{route('inventory.index')}}" class="btn btn-sm btn-success">Back</a>
          <button type="submit" class="btn btn-sm btn-primary">Submit</button>
        </div> 
      </div>
    </form>
  </div>
@endsection