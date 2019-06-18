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
          <strong>Nombre : </strong> {{$active_input->input_name}}
        </div>
      </div>

      <div class="col-md-12">
          <div class="form-group">
              <strong>Valor UF: </strong> {{$active_input->uf_value}}
          </div>
      </div>

      <div class="col-md-12">
          <div class="form-group">
              <strong>Numero de serie : </strong> {{$active_input->serial_number}}
          </div>
      </div>

      <div class="col-md-12">
          <div class="form-group">
            <strong>Modelo : </strong> {{$active_input->model->model_name}}
          </div>
        </div>

      <div class="col-md-12">
          <div class="form-group">
            <strong>Marca : </strong> {{$active_input->model->trademark->trademark_name}}
          </div>
      </div>

      <div class="col-md-12">
          <div class="form-group">
              <strong>Caracteristicas : </strong> {{$active_input->characteristic}}
          </div>
      </div>

      <div class="col-md-12">
          <div class="form-group">
              <strong>Observación : </strong> {{$active_input->observation}}
          </div>
      </div>

      <div class="col-md-12">
          <div class="form-group">
              <strong>Descripcion : </strong> {{$active_input->description}}
          </div>
      </div>


      <div class="col-md-12">
        <a href="{{route('active_input.index')}}" class="btn btn-sm btn-success">Atrás</a>
      </div>
    </div>
  </div>
@endsection