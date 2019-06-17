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
          <strong>Nombre : </strong> {{$study_plan->study_plan_name}}
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <strong>Nombre Carrera : </strong> {{$study_plan->career->career_name}}
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <strong>Fecha de inicio : </strong> {{$study_plan->date_start}}
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <strong>Fecha de termino : </strong> {{$study_plan->date_end}}
        </div>
      </div>
      <div class="col-md-12">
        <a href="{{route('study_plan.index')}}" class="btn btn-sm btn-success">Atras</a>
      </div>
    </div>
  </div>
@endsection