@extends('layouts.master')

@section('dentro_de_master')

  <div class="container">
    <div class="row">
      <div class="col-md-10">
        <h3>Lista de prestamos</h3>
      </div>
      <div class="col-sm-2">
        <a class="btn btn-sm btn-success" href="{{ route('lending.create')}}">Agregar nuevo prestamo</a>
      </div>
    </div>

    @if ($message = Session::get('success'))
      <div class="alert alert-success">
        <p>{{$message}}</p>
      </div>
    @endif

    <table class="table table-hover table-sm">
      <tr>
        <th width = "50px"><b>ID.</b></th>
        <th>Nombre responsable</th>
        <th>Nombre usuario</th>
        <th>Fecha de prestamo</th>
        <th>F. Devolucion propuesta</th>
        <th>F Devolucion real</th>
        <th width = "200px">Action</th>
      </tr>
      
      @foreach ($lendings as $lending)
        <tr>
          <td><b>{{$lending->id}}.</b></td>
          <td>{{$lending->liable->name_person}} {{$lending->liable->last_name_person}}</td>
          <td>{{$lending->userData->email}}</td>
          <td>{{$lending->loan_date}}</td>
          <td>{{$lending->supposed_return_date}}</td>
          <td>{{$lending->real_return_date}}</td>
          <td>
          <form action="{{route('lending.destroy', $lending->id)}}" method="post">
            <a class="btn btn-sm btn-success" href="{{route('lending.show',$lending->id)}}">Mostrar</a>
              <a class="btn btn-sm btn-warning" href="{{route('lending.edit',$lending->id)}}">Editar</a>
              @csrf
              {{-- <form action="{{route('lending.edit', $lending->id)}}" method="post">
                <button type="submit" class="btn btn-sm btn-warning">Registrar Devolucion</button>
              </form> --}}
              @method('DELETE')
              <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
            </form>
          </td>
        </tr>
      @endforeach
    </table>


  </div>
@endsection