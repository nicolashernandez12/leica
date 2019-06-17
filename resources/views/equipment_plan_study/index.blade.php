@extends('layouts.master')

@section('dentro_de_master')

  <div class="container">
    <div class="row">
      <div class="col-md-10">
        <h3>Lista de equipo plan de estudio</h3>
      </div>
      <div class="col-sm-2">
        <a class="btn btn-sm btn-success" href="{{ route('equipment_plan_study.create')}}">Agregar nuevo equipo plan de estudio</a>
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
        <th>Activo Inzumo</th>
        <th width = "200px">Accion</th>
      </tr>
      
      @foreach ($equipment_plan_studies as $equipment_plan_study)
        <tr>
          <td><b>{{$equipment_plan_study->id}}.</b></td>
          <td>{{$equipment_plan_study->activeInput->input_name}}</td>
          <td>{{$equipment_plan_study->studyPlan->study_plan_name}}</td>
          <td>
          <form action="{{route('equipment_plan_study.destroy', $equipment_plan_study->id)}}" method="post">
            <a class="btn btn-sm btn-success" href="{{route('equipment_plan_study.show',$equipment_plan_study->id)}}">Mostrar</a>
              <a class="btn btn-sm btn-warning" href="{{route('equipment_plan_study.edit',$equipment_plan_study->id)}}">Editar</a>
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