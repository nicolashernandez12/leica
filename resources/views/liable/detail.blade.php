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
          <strong>Name : </strong> {{$liable->name_person}}
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <strong>Last Name : </strong> {{$liable->last_name_person}}
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <strong>rut: </strong> {{$liable->rut}}
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <strong>Position : </strong> {{$liable->position->position_name}}
        </div>
      </div>
      <div class="col-md-12">
        <a href="{{route('liable.index')}}" class="btn btn-sm btn-success">Back</a>
      </div>
    </div>
  </div>
@endsection