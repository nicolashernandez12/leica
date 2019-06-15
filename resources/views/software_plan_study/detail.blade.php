@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3>Detalle</h3>
        <hr>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <strong>Plan de esudio : </strong> {{$software_plan_study->studyPlan->study_plan_name}}
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <strong>Software : </strong> {{$software_plan_study->software->name_software}}
        </div>
      </div>
      <div class="col-md-12">
        <a href="{{route('software_plan_study.index')}}" class="btn btn-sm btn-success">Atras</a>
      </div>
    </div>
  </div>
@endsection