@extends('layouts.master')

@section('dentro_de_master')
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3>Editar responsable</h3>
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

    <form action="{{route('liable.update',$liable->id)}}" method="post">
      @csrf
      @method('PUT')
      <div class="row">
          <div class="col-md-12">
              <strong>Nombre:</strong>
              <input type="text" name="name_person" class="form-control" value="{{$liable->name_person}}">
          </div>

          <div class="col-md-12">
              <strong>Apellido:</strong>
              <input type="text" name="last_name_person" class="form-control" value="{{$liable->last_name_person}}">
          </div>

          <div class="col-md-12">
              <strong>rut:</strong>
              <input type="text" name="rut" class="form-control" value="{{$liable->rut}}">
          </div>
          
          <div class="col-md-12">
            <strong>Cargo: </strong>
            <select class="form-control" name="id_position">
              <option selected value="{{$liable->position->id}}">{{$liable->position->position_name}}</option>
                @foreach ($positions as $position)
              <option value="{{$position->id}}">{{$position->position_name}}</option>
                @endforeach
            </select>
          </div>
          

        <div class="col-md-12">
          <a href="{{route('liable.index')}}" class="btn btn-sm btn-success">Atrás</a>
          <button type="submit" class="btn btn-sm btn-primary">Guardar</button>
        </div> 
      </div>
    </form>
  </div>
@endsection