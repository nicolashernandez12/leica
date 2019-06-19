@extends('layouts.master')

@section('dentro_de_master')
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3>Editar Estado</h3>
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

    <form action="{{route('state.update',$state->id)}}" method="post">
      @csrf
      @method('PUT')
      <div class="row">
        <div class="col-md-12">
          <strong>Nombre:</strong>
          <input type="text" name="state_name" class="form-control" value="{{$state->state_name}}">
        </div>
        <div class="col-md-12">
          <strong>Descripción :</strong>
          <textarea class="form-control" name="description" rows="8" cols="80">{{$state->description}}</textarea>
        </div>

        <div class="col-md-12">
          <a href="{{route('state.index')}}" class="btn btn-sm btn-success">Atrás</a>
          <button type="submit" class="btn btn-sm btn-primary">Guardar</button>
        </div>
      </div>
    </form>
  </div>
@endsection