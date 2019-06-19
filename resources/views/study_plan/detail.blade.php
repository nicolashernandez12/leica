@extends('layouts.master')

@section('dentro_de_master')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3>Detalle</h3>
        <hr>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <strong>Nombre : </strong> {{$study_plan->study_plan_name}}
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <strong>Nombre Carrera : </strong> {{$study_plan->career->career_name}}
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <strong>Fecha de inicio : </strong> {{$study_plan->date_start}}
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <strong>Fecha de termino : </strong> {{$study_plan->date_end}}
        </div>
      </div>


      {{-- <div>
          <table>
              <tr>
                  <th>Software:</th>
                </tr>
                @foreach ($study_plan as $software)
                  <tr>
                    <td>{{$software->software->name_software}}</td>
                  </tr>
                @endforeach
          </table>
        </div> --}}

        <div class="col-md-12">
            <strong>Software: </strong>
            <select class="form-control" name="softwares[]" multiple readonly="readonly">
                @foreach ($softwares as $software)
                    @if(in_array($software->id, $software_ids))
                        <option  value="{{$software->id}}">{{$software->name_software}}</option>
                    @endif

                @endforeach
            </select>
        </div>


      <div class="col-md-12">
        <a href="{{route('study_plan.index')}}" class="btn btn-sm btn-success">Atras</a>
      </div>
    </div>
  </div>
@endsection