@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3>New active input</h3>
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

    <form action="{{route('active_input.store')}}" method="post">
      @csrf
      <div class="row">

        <div class="col-md-12">
          <strong>Name:</strong>
          <input type="text" name="input_name" class="form-control" placeholder="active_input name" required="required">
        </div>

        <div class="col-md-12">
            <strong>UF Value:</strong>
            <input type="number" name="uf_value" class="form-control" placeholder="UF Value" required="required">
          </div>

        <div class="col-md-12">
          <strong>Characteristic :</strong>
          <textarea class="form-control" placeholder="characteristic" name="characteristic" rows="4" cols="80"></textarea>
        </div>

        <div class="col-md-12">
            <strong>Observation :</strong>
            <textarea class="form-control" placeholder="observation" name="observation" rows="4" cols="80"></textarea>
        </div>

        <div class="col-md-12">
            <strong>Description :</strong>
            <textarea class="form-control" placeholder="description" name="description" rows="4" cols="80"></textarea>
        </div>

        <div class="col-md-12">
            <strong>Serial Number:</strong>
            <input type="text" name="serial_number" class="form-control" placeholder="serial number" required="required">
        </div>

        <div class="col-md-12">
            <strong>Modelo: </strong>
            <select class="form-control" name="id_model">
              @foreach ($models as $model)
              <option value="{{$model->id}}">{{$model->model_name}}</option>
              @endforeach
            </select>
        </div>

        <div class="col-md-12">
            <strong>Maintenance Plan: </strong>
            <select class="form-control" name="id_maintenance_plan">
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