@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3>Edit active input</h3>
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

    <form action="{{route('active_input.update',$active_input->id)}}" method="post">
      @csrf
      @method('PUT')
      <div class="row">
        <div class="col-md-12">
          <strong>Name :</strong>
          <input type="text" name="input_name" class="form-control" value="{{$active_input->input_name}}">
        </div>

        <div class="col-md-12">
            <strong>UF Value:</strong>
            <input type="number" name="uf_value" class="form-control" value="{{$active_input->uf_value}}" required="required">
          </div>

        <div class="col-md-12">
          <strong>Characteristic :</strong>
          <textarea class="form-control" value="{{$active_input->characteristic}}" name="characteristic" rows="4" cols="80"></textarea>
        </div>

        <div class="col-md-12">
            <strong>Observation :</strong>
            <textarea class="form-control" value="{{$active_input->observation}}" name="observation" rows="4" cols="80"></textarea>
        </div>

        <div class="col-md-12">
            <strong>Description :</strong>
            <textarea class="form-control" value="{{$active_input->description}}" name="description" rows="4" cols="80"></textarea>
        </div>

        <div class="col-md-12">
            <strong>Serial Number:</strong>
            <input type="text" name="serial_number" class="form-control" value="{{$active_input->serial_number}}" required="required">
        </div>

        <div class="col-md-12">
            <strong>model: </strong>
            <select class="form-control" name="id_model">
              <option selected value="{{$active_input->model->id}}">{{$active_input->model->model_name}}</option>
                @foreach ($models as $model)
              <option value="{{$model->id}}">{{$model->model_name}}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-12">
            <strong>maintenance_plan: </strong>
            <select class="form-control" name="id_maintenance_plan">
              <option selected value="{{$active_input->maintenancePlan->id}}">{{$active_input->maintenancePlan->maintenance_plan_name}}</option>
                @foreach ($maintenance_plans as $maintenance_plan)
              <option value="{{$maintenance_plan->id}}">{{$maintenance_plan->maintenance_plan_name}}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-12">
          <a href="{{route('active_input.index')}}" class="btn btn-sm btn-success">Back</a>
          <button type="submit" class="btn btn-sm btn-primary">Submit</button>
        </div>
      </div>
    </form>
  </div>
@endsection