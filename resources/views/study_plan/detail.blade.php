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
          <strong>Name : </strong> {{$study_plan->study_plan_name}}
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <strong>Career Name : </strong> {{$study_plan->career->career_name}}
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <strong>Date Start : </strong> {{$study_plan->date_start}}
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <strong>Date End : </strong> {{$study_plan->date_end}}
        </div>
      </div>
      <div class="col-md-12">
        <a href="{{route('study_plan.index')}}" class="btn btn-sm btn-success">Back</a>
      </div>
    </div>
  </div>
@endsection