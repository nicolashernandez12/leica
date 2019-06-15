@extends('layouts.app')
@section('content')

  <div class="container">
    <div class="row">
      <div class="col-md-10">
        <h3>Lista de software plan de estudio</h3>
      </div>
      <div class="col-sm-2">
        <a class="btn btn-sm btn-success" href="{{ route('software_plan_study.create')}}">Agregar nuevo software plan de estudio</a>
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
        <th>Plan de estudio</th>
        <th>Software</th>
        <th width = "200px">Accion</th>
      </tr>
      
      @foreach ($software_plan_studies as $software_plan_study)
        <tr>
          <td><b>{{$software_plan_study->id}}.</b></td>
          <td>{{$software_plan_study->studyPlan->study_plan_name}}</td>
          <td>{{$software_plan_study->software->name_software}}</td>
          <td>
          <form action="{{route('software_plan_study.destroy', $software_plan_study->id)}}" method="post">
            <a class="btn btn-sm btn-success" href="{{route('software_plan_study.show',$software_plan_study->id)}}">Mostrar</a>
              <a class="btn btn-sm btn-warning" href="{{route('software_plan_study.edit',$software_plan_study->id)}}">Editar</a>
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
            </form>
          </td>
        </tr>
      @endforeach
    </table>


  </div>
@endsection