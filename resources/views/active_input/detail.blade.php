@extends('layouts.app')
@section('content')
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
          <strong>Name : </strong> {{$active_input->input_name}}
        </div>
      </div>

      <div class="col-md-12">
          <div class="form-group">
              <strong>UF Value : </strong> {{$active_input->uf_value}}
          </div>
      </div>

      <div class="col-md-12">
          <div class="form-group">
              <strong>Serial Number : </strong> {{$active_input->serial_number}}
          </div>
      </div>

      <div class="col-md-12">
          <div class="form-group">
            <strong>Model : </strong> {{$active_input->model->model_name}}
          </div>
        </div>

      <div class="col-md-12">
          <div class="form-group">
            <strong>Trademark : </strong> {{$active_input->model->trademark->trademark_name}}
          </div>
      </div>

      <div class="col-md-12">
          <div class="form-group">
              <strong>Characteristic : </strong> {{$active_input->characteristic}}
          </div>
      </div>

      <div class="col-md-12">
          <div class="form-group">
              <strong>Observation : </strong> {{$active_input->observation}}
          </div>
      </div>

      <div class="col-md-12">
          <div class="form-group">
              <strong>Description : </strong> {{$active_input->description}}
          </div>
      </div>


      <div class="col-md-12">
        <a href="{{route('active_input.index')}}" class="btn btn-sm btn-success">Back</a>
      </div>
    </div>
  </div>
@endsection