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
          <strong>Inventory : </strong> {{$loan_registration->inventory->activeInput->input_name}}
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <strong>Lending : </strong> {{$loan_registration->liable->name_person}}
        </div>
      </div>
      <div class="col-md-12">
        <a href="{{route('equipment_plan_study.index')}}" class="btn btn-sm btn-success">Back</a>
      </div>
    </div>
  </div>
@endsection