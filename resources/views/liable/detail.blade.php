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
          <strong>Nombre : </strong> {{$liable->name_person}}
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <strong>Apellido : </strong> {{$liable->last_name_person}}
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <strong>rut: </strong> {{$liable->rut}}
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <strong>Cargo : </strong> {{$liable->position->position_name}}
        </div>
      </div>
      <div class="col-md-12">
        <a href="{{route('liable.index')}}" class="btn btn-sm btn-success">Atrás</a>
      </div>
    </div>
  </div>
@endsection