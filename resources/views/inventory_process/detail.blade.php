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
          <strong>Date Execution : </strong> {{$inventory_process->date_execution}}
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <strong>Type Inventory Name : </strong> {{$inventory_process->typeInventory->type_inventory_name}}
        </div>
      </div>
      <div class="col-md-12">
        <a href="{{route('inventory_process.index')}}" class="btn btn-sm btn-success">Back</a>
      </div>
    </div>
  </div>
@endsection