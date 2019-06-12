@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3>New Equipment Plan Study</h3>
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

    <form action="{{route('equipment_plan_study.store')}}" method="post">
      @csrf
      <div class="row">

      <div class="col-md-12">
          <strong>Study </strong>
          <select class="form-control" name="id_study_plan">
            @foreach ($study_plans as $study_plan)
            <option value="{{$study_plan->id}}">{{$study_plan->study_plan_name}}</option>
            @endforeach
          </select>
      </div>

      <div class="col-md-12">
        <strong>Active Input: </strong>
        <select class="form-control" name="id_active_input">
          @foreach ($active_inputs as $active_input)
          <option value="{{$active_input->id}}">{{$active_input->input_name}}</option>
          @endforeach
        </select>
      </div>
       
      
        <div class="col-md-12">
          <a href="{{route('equipment_plan_study.index')}}" class="btn btn-sm btn-success">Back</a>
          <button type="submit" class="btn btn-sm btn-primary">Submit</button>
        </div>
      </div>
    </form>

  </div>
@endsection