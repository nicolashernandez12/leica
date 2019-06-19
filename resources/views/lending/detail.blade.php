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
          <strong>Nombre responsable : </strong> {{$lending->liable->name_person}} 
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <strong>Apellido  : </strong> {{$lending->liable->last_name_person}}
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <strong>Usuario: </strong> {{$lending->userData->email}}
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <strong>Fecha de prestamo : </strong> {{$lending->loan_date}}
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <strong>Fecha de regreso propuesta : </strong> {{$lending->supposed_return_date}}
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <strong>Fecha de regreso real : </strong> {{$lending->real_return_date}}
        </div>
      </div>
      <div class="col-md-12">
        <a href="{{route('lending.index')}}" class="btn btn-sm btn-success">Atrás</a>
      </div>
    </div>
  </div>
@endsection