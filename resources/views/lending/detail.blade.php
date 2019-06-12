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
          <strong>Name Liable : </strong> {{$lending->liable->name_person}} 
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <strong>Last Name : </strong> {{$lending->liable->last_name_person}}
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <strong>user: </strong> {{$lending->userData->liable->name_person}} {{$lending->userData->liable->last_name_person}} 
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <strong>Loan Date : </strong> {{$lending->loan_date}}
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <strong>Supposed Return Date : </strong> {{$lending->supposed_return_date}}
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <strong>Real Return Date : </strong> {{$lending->real_return_date}}
        </div>
      </div>
      <div class="col-md-12">
        <a href="{{route('lending.index')}}" class="btn btn-sm btn-success">Back</a>
      </div>
    </div>
  </div>
@endsection