@extends('layouts.master')

@section('dentro_de_master')

{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3>Agregar Prestamo</h3>
      </div>
    </div>

    @if ($errors->any())
      <div class="alert alert-danger">
        <strong>Whoops! </strong> there where some problems with your input.<br>
        <ul>
          @foreach ($errors as $error)
            <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{route('lending.store')}}" method="post">
      @csrf
      <div class="row">
       
        <div class="col-md-10">
            <strong>Nombre responsable: </strong>
            <select class="form-control" name="id_liable">
              @foreach ($liables as $liable)
                <option value="{{$liable->id}}">{{$liable->name_person}} {{$liable->last_name_person}}</option>
              @endforeach
            </select>
          </div>
          <div class="col-md-2">
            <br>
              <a href="{{route('liable.create')}}" class="btn btn-sm btn-success form-control">Agregar responsable</a>
          </div>

        {{-- <div class="col-md-12">
          <strong>Usuario: </strong>
          <select class="form-control" name="id_user">
            @foreach ($users as $user)
              <option value="{{$user->id}}">{{$user->email}}</option>
            @endforeach
          </select>
        </div> --}}

        <div class="col-md-12">
            {{-- <strong>Usuario:</strong> --}}
            <input type="hidden" name="id_user" class="form-control" value="{{ Auth::user()->id }}">
          </div>

        
        <div class="col-md-12">
            <strong>Inventario: </strong>
            <select class="form-control" name="inventories[]" multiple>
                @foreach ($inventories as $inventory)
                    <option value="{{$inventory->id}}">{{$inventory->activeInput->input_name}}</option>
                @endforeach
            </select>
        </div>
        

        <div class="col-md-12">
            <strong>Fecha prestamo:</strong>
            <input type="date" name="loan_date" class="form-control">
          </div>

        <div class="col-md-12">
            <strong>Fecha de regreso propuesta:</strong>
            <input type="date" name="supposed_return_date" class="form-control">
        </div>

        {{-- <div class="col-md-12">
            <strong>Real Return Date:</strong>
            <input type="date" name="real_return_date" class="form-control">
        </div> --}}

        <div class="col-md-12">
          <a href="{{route('lending.index')}}" class="btn btn-sm btn-success">Atras</a>
          <button type="submit" class="btn btn-sm btn-primary">Guardar</button>
        </div>
      </div>
    </form>

  </div>
@endsection