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
          <strong>Name : </strong> {{$software_type->software_type_name}}
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <strong>Description : </strong> {{$software_type->description}}
        </div>
      </div>
      <div class="col-md-12">
        <a href="{{route('software_type.index')}}" class="btn btn-sm btn-success">Back</a>
      </div>
    </div>
  </div>
@endsection