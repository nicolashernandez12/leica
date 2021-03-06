@extends('layouts.master')

@section('dentro_de_master')
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3>Editar lugar software</h3>
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

    <form action="{{route('place_software.update',$place->id)}}" method="post">
      @csrf
      @method('PUT')
      <div class="row">

          <div class="col-md-12">
              {{-- <strong>Usuario:</strong> --}}
              <input type="hidden" name="id_place" class="form-control" value="{{$place->id}}">
            </div>

            <div class="col-md-12">
                <strong>Software: </strong>
                <select class="form-control" name="softwares[]" multiple>
                    @foreach ($softwares as $software)
                        @if(in_array($software->id, $software_ids))
                            <option selected value="{{$software->id}}">{{$software->name_software}}</option>
                        @else
                            <option value="{{$software->id}}">{{$software->name_software}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
          {{-- <div class="col-md-12">
            <strong>Software: </strong>
            <select class="form-control" name="id_software">
              <option selected value="{{$place_software->software->id}}">{{$place_software->software->name_software}}</option>
                @foreach ($softwares as $software)
              <option value="{{$software->id}}">{{$software->name_software}}</option>
                @endforeach
            </select>
          </div> --}}

        <div class="col-md-12">
          <a href="{{route('place_software.index')}}" class="btn btn-sm btn-success">Atras</a>
          <button type="submit" class="btn btn-sm btn-primary">Guardar</button>
        </div> 
      </div>
    </form>
  </div>
@endsection