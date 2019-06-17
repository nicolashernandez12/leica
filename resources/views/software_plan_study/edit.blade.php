@extends('layouts.master')

@section('dentro_de_master')
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3>Editar software plan de estudio</h3>
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

    <form action="{{route('software_plan_study.update',$software_plan_study->id)}}" method="post">
      @csrf
      @method('PUT')
      <div class="row">

          <div class="col-md-12">
              <strong>Plan de estudio: </strong>
              <select class="form-control" name="id_study_plan">
                <option selected value="{{$software_plan_study->studyPlan->id}}">{{$software_plan_study->studyPlan->study_plan_name}}</option>
                  @foreach ($study_plans as $study_plan)
                <option value="{{$study_plan->id}}">{{$study_plan->study_plan_name}}</option>
                  @endforeach
              </select>
          </div>

          <div class="col-md-12">
            <strong>Software: </strong>
            <select class="form-control" name="id_software">
              <option selected value="{{$software_plan_study->software->id}}">{{$software_plan_study->software->name_software}}</option>
                @foreach ($softwares as $software)
              <option value="{{$software->id}}">{{$software->name_software}}</option>
                @endforeach
            </select>
          </div>

        <div class="col-md-12">
          <a href="{{route('software_plan_study.index')}}" class="btn btn-sm btn-success">Atras</a>
          <button type="submit" class="btn btn-sm btn-primary">Guardar</button>
        </div> 
      </div>
    </form>
  </div>
@endsection