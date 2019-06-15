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
          <strong>Fecha Mantencion : </strong> {{$maintenance->date_maintenance}}
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <strong>Usuario : </strong>{{$maintenance->userData->liable->name_person}} {{$maintenance->userData->liable->last_name_person}}
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <strong>Inventario: </strong> {{$maintenance->inventory->activeInput->input_name}}
        </div>
      </div>

      <div class="col-md-12">
        <div class="form-group">
          <strong>Razon: </strong> {{$maintenance->reason->reason_name}}
        </div>
      </div>

      <div class="col-md-12">
        <a href="{{route('maintenance.index')}}" class="btn btn-sm btn-success">Back</a>
      </div>
    </div>
  </div>
@endsection