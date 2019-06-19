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
          <strong>Nombre: </strong> {{$inventory->activeInput->input_name}}
        </div>
      </div>

      <div class="col-md-12">
        <div class="form-group">
            <strong>Numero de serie : </strong> {{$inventory->serial_number}}
        </div>
    </div>
      <div class="col-md-12">
        <div class="form-group">
          <strong>Cantidad: </strong> {{$inventory->quantity}}
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <strong>Estado: </strong> {{$inventory->state->state_name}}
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <strong>Observación : </strong> {{$inventory->observation}}
        </div>
      </div>
      <div class="col-md-12">
        <a href="{{route('inventory.index')}}" class="btn btn-sm btn-success">Atrás</a>
      </div>
    </div>
  </div>
@endsection