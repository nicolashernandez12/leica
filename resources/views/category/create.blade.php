@extends('layouts.master')

@section('dentro_de_master')

  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3>Agregar Categoria</h3>
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

    <form action="{{route('category.store')}}" method="post">
      @csrf
      <div class="row">
        <div class="col-md-12">
          <strong>Nombre:</strong>
          <input type="text" name="category_name" class="form-control" placeholder="Nombre Categoria" required="required">
        </div>
        <div class="col-md-12">
          <strong>Descripción :</strong>
          <textarea class="form-control" placeholder="Ingresar Descripción" name="description" rows="8" cols="80" required="required"></textarea>
        </div>
        
        <div class="col-md-12">
          <a href="{{route('category.index')}}" class="btn btn-sm btn-success">Atrás</a>
          <button type="submit" class="btn btn-sm btn-primary">Guardar</button>
        </div>
      </div>
    </form>

  </div>
@endsection