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
          <strong>Name : </strong> {{$maintenance_plan->maintenance_plan_name}}
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <strong>Priority Name : </strong> {{$maintenance_plan->priority->priority_name}}
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <strong>Frequency Name : </strong> {{$maintenance_plan->frequency->frequency_name}}
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <strong>reason Name : </strong> {{$maintenance_plan->reason->reason_name}}
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <strong>Description : </strong> {{$maintenance_plan->description}}
        </div>
      </div>
      <div class="col-md-12">
        <a href="{{route('maintenance_plan.index')}}" class="btn btn-sm btn-success">Back</a>
      </div>
    </div>
  </div>
@endsection