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
          <strong>Inventory : </strong> {{$shrinkage->inventory->activeInput->input_name}}
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <strong>Type Shrinkage : </strong> {{$shrinkage->typeShrinkage->type_shrinkage_name}}
        </div>
      </div>
      <div class="col-md-12">
        <a href="{{route('shrinkage.index')}}" class="btn btn-sm btn-success">Back</a>
      </div>
    </div>
  </div>
@endsection