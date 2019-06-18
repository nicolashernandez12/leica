@extends('layouts.master')

@section('dentro_de_master')
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
          <strong>Nombre : </strong> {{$maintenance_plan->maintenance_plan_name}}
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <strong>Prioridad : </strong> {{$maintenance_plan->priority->priority_name}}
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <strong>Frecuencia : </strong> {{$maintenance_plan->frequency->frequency_name}}
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <strong>Descripción : </strong> {{$maintenance_plan->description}}
        </div>
      </div>
      <div class="col-md-12">
        <a href="{{route('maintenance_plan.index')}}" class="btn btn-sm btn-success">Atrás</a>
      </div>
    </div>
  </div>
@endsection