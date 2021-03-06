@extends('layouts.master')

@section('dentro_de_master')
{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3>Agregar Plan de mantenimiento</h3>
      </div>
    </div>

    @if ($errors->any())
      <div class="alert alert-danger">
        <strong>Whoops! </strong> Hay algun(os) problema(s) con tu(s) entrada(s).<br>
        <ul>
          @foreach ($errors as $error)
            <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{route('maintenance_plan.store')}}" method="post">
      @csrf
      <div class="row">
      <div class="col-md-12">
          <strong>Nombre:</strong>
          <input type="text" name="maintenance_plan_name" class="form-control" placeholder="nombre del plan de mantenimiento">
        </div>
        <div class="col-md-12">
          <strong>Descripción :</strong>
          <textarea class="form-control" placeholder="descripción del plan de mantenimiento" name="description" rows="8" cols="80"></textarea>
        </div>
        
          <div class="col-md-10">
            <strong>frecuencia : </strong>
            <select class="form-control" name="id_frequency">
              @foreach ($frequencies as $frequency)
              <option value="{{$frequency->id}}">{{$frequency->frequency_name}}</option>
              @endforeach
            </select>
          </div>

          <div class="col-md-2">
            <br>
              <a href="{{route('frequency.create')}}" class="btn btn-sm btn-success form-control">Agregar frecuencia</a>
          </div>

        
          <div class="col-md-10">
            <strong>prioridad: </strong>
            <select class="form-control" name="id_priority">
              @foreach ($priorities as $priority)
              <option value="{{$priority->id}}">{{$priority->priority_name}}</option>
              @endforeach
            </select>
          </div>
        
          <div class="col-md-2">
            <br>
              <a href="{{route('priority.create')}}" class="btn btn-sm btn-success form-control">Agregar prioridad</a>
          </div>


        <div class="col-md-12">
          <a href="{{route('maintenance_plan.index')}}" class="btn btn-sm btn-success">Atrás</a>
          <button type="submit" class="btn btn-sm btn-primary">Guardar</button>
        </div>
      </div>
    </form>

  </div>
@endsection