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
          <strong>Nombre : </strong> {{$software->name_software}}
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <strong>Versión : </strong> {{$software->version}}
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <strong>Tipo de software : </strong> {{$software->softwareType->software_type_name}}
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <strong>Descripción : </strong> {{$software->description}}
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <strong>Observación : </strong> {{$software->Observation}}
        </div>
      </div>
      <div class="col-md-12">
        <a href="{{route('software.index')}}" class="btn btn-sm btn-success">Atras</a>
      </div>
    </div>
  </div>
@endsection