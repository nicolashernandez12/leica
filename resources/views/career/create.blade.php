@extends('layouts.master')

@section('dentro_de_master')

  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3>Agregar Carrera</h3>
      </div>
    </div>

    @if ($errors->any())
      <div class="alert alert-danger">
        <strong>Whoops! </strong> Hay alguno(s) problema(s) con tu(s) entrada(s).<br>
        <ul>
          @foreach ($errors as $error)
            <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{route('career.store')}}" method="post">
      @csrf
      <div class="row">
        <div class="col-md-12">
          <strong>Nombre:</strong>
          <input type="text" name="career_name" class="form-control" placeholder="nombre carrera" required="required">
        </div>
        <div class="col-md-12">
          <strong>Descripción :</strong>
<<<<<<< HEAD
          <textarea class="form-control" placeholder="ingresar descripcion" name="description" rows="8" cols="80" required="required"></textarea>
=======
          <textarea class="form-control" placeholder="ingresar descripcion" name="descripción de carrera" rows="8" cols="80" required="required"></textarea>
>>>>>>> dba0700bca3ff6d2d1dfdb43ce649c2ce065514d
        </div>
        
        <div class="col-md-12">
          <a href="{{route('career.index')}}" class="btn btn-sm btn-success">Atrás</a>
          <button type="submit" class="btn btn-sm btn-primary">Guardar</button>
        </div>
      </div>
    </form>

  </div>
@endsection