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
          <strong>Lugar : </strong> {{$place_software->palce->place_name}}
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <strong>Software : </strong> {{$place_software->software->name_software}}
        </div>
      </div>
      <div class="col-md-12">
        <a href="{{route('place_software.index')}}" class="btn btn-sm btn-success">Atras</a>
      </div>
    </div>
  </div>
@endsection