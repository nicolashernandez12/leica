@extends('layouts.master')

@section('dentro_de_master')

  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3>Editar prestamo</h3>
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

    <form action="{{route('lending.update',$lending->id)}}" method="post">
      @csrf
      @method('PUT')
      <div class="row">
          
          <div class="col-md-12">
            <strong>Usuario: </strong>
            <select class="form-control" name="id_user">
              <option selected value="{{$lending->userData->id}}">{{$lending->userData->email}}</option>
                @foreach ($users as $user)
              <option value="{{$user->id}}">{{$user->email}}</option>
                @endforeach
            </select>
          </div>

          <div class="col-md-12">
              <strong>Responsable: </strong>
              <select class="form-control" name="id_liable">
                <option selected value="{{$lending->liable->id}}">{{$lending->liable->name_person}}</option>
                  @foreach ($liables as $liable)
                <option value="{{$liable->id}}">{{$liable->name_person}}</option>
                  @endforeach
              </select>
            </div>

            <div class="col-md-12">
                <strong>Fecha de prestamo:</strong>
                <input type="date" name="loan_date" class="form-control" value="{{$lending->loan_date}}">
            </div>

            <div class="col-md-12">
                <strong>Fecha de regreso propuesta::</strong>
                <input type="date" name="supposed_return_date" class="form-control" value="{{$lending->supposed_return_date}}">
            </div>

            <div class="col-md-12">
                <strong>Fecha de regreso real:</strong>
                <input type="date" name="real_return_date" class="form-control" value="{{$lending->real_return_date}}">
            </div>
          

        <div class="col-md-12">
          <a href="{{route('lending.index')}}" class="btn btn-sm btn-success">Atrás</a>
          <button type="submit" class="btn btn-sm btn-primary">Guardar</button>
        </div> 
      </div>
    </form>
  </div>
@endsection