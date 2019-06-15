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
          <strong>Name : </strong> {{$software->name_software}}
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <strong>Version : </strong> {{$software->version}}
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <strong>Software Type : </strong> {{$software->softwareType->software_type_name}}
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <strong>Description : </strong> {{$software->description}}
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <strong>Observation : </strong> {{$software->Observation}}
        </div>
      </div>
      <div class="col-md-12">
        <a href="{{route('software.index')}}" class="btn btn-sm btn-success">Back</a>
      </div>
    </div>
  </div>
@endsection