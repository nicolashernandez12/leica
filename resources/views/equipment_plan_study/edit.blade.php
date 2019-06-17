@extends('layouts.master')

@section('dentro_de_master')
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3>Editar equipo plan de estudio</h3>
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

    <form action="{{route('equipment_plan_study.update',$equipment_plan_study->id)}}" method="post">
      @csrf
      @method('PUT')
      <div class="row">

          <div class="col-md-12">
              <strong>Plan de estudio: </strong>
              <select class="form-control" name="id_study_plan">
                <option selected value="{{$equipment_plan_study->studyPlan->id}}">{{$equipment_plan_study->studyPlan->study_plan_name}}</option>
                  @foreach ($study_plans as $study_plan)
                <option value="{{$study_plan->id}}">{{$study_plan->study_plan_name}}</option>
                  @endforeach
              </select>
          </div>

          <div class="col-md-12">
            <strong>Activo inzumo: </strong>
            <select class="form-control" name="id_active_input">
              <option selected value="{{$equipment_plan_study->activeInput->id}}">{{$equipment_plan_study->activeInput->input_name}}</option>
                @foreach ($active_inputs as $active_input)
              <option value="{{$active_input->id}}">{{$active_input->input_name}}</option>
                @endforeach
            </select>
          </div>

        <div class="col-md-12">
          <a href="{{route('equipment_plan_study.index')}}" class="btn btn-sm btn-success">Atras</a>
          <button type="submit" class="btn btn-sm btn-primary">Guardar</button>
        </div> 
      </div>
    </form>
  </div>
@endsection