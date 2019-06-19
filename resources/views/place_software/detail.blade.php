@extends('layouts.master')

@section('dentro_de_master')
  <div class="container">
      <div class="col-md-10">
      <h3>{{$place->place_name}}</h3>
        </div>
      <table class="table table-hover table-sm">
          <tr>
            <th width = "50px"><b>ID.</b></th>
            <th width = "300px">Software</th>
          </tr>
    
          @foreach ($place_softwares as $place_software)
            <tr>
              <td><b>{{$place_software->software->id}}.</b></td>
              <td>{{$place_software->software->name_software}}</td>
              <td>
              {{-- <form action="{{route('place.destroy', $place->id)}}" method="post">
                <a class="btn btn-sm btn-success" href="{{route('place.show',$place->id)}}">Mostrar</a>
                  <a class="btn btn-sm btn-warning" href="{{route('place.edit',$place->id)}}">Editar</a>
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                </form> --}}
              </td>
            </tr>
          @endforeach
        </table>
    {{-- <div class="row">
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
    </div> --}}

    <div class="col-md-12">
        <a href="{{route('place_software.index')}}" class="btn btn-sm btn-success">Atras</a>
      </div> 
  </div>
@endsection