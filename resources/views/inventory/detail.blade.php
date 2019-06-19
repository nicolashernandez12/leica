@extends('layouts.master')

@section('dentro_de_master')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3>Detail</h3>
        <hr>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <strong>Name Active Input : </strong> {{$inventory->activeInput->input_name}}
        </div>
      </div>

      <div class="col-md-12">
        <div class="form-group">
            <strong>Numero de serie : </strong> {{$inventory->serial_number}}
        </div>
    </div>
      <div class="col-md-12">
        <div class="form-group">
          <strong>quantity : </strong> {{$inventory->quantity}}
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <strong>State : </strong> {{$inventory->state->state_name}}
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <strong>Observation : </strong> {{$inventory->observation}}
        </div>
      </div>
      <div class="col-md-12">
        <a href="{{route('inventory.index')}}" class="btn btn-sm btn-success">Back</a>
      </div>
    </div>
  </div>
@endsection