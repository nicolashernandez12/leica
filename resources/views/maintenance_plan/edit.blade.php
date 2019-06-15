@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3>Edit Maintenance Plan</h3>
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

    <form action="{{route('maintenance_plan.update',$maintenance_plan->id)}}" method="post">
      @csrf
      @method('PUT')
      <div class="row">
          <div class="col-md-12">
              <strong>Maintenance Plan Name:</strong>
              <input type="text" name="maintenance_plan_name" class="form-control" value="{{$maintenance_plan->maintenance_plan_name}}">
          </div>

          <div class="col-md-12">
              <strong>Reason: </strong>
              <select class="form-control" name="id_reason">
                <option selected value="{{$maintenance_plan->reason->id}}">{{$maintenance_plan->reason->reason_name}}</option>
                  @foreach ($reasons as $reason)
                <option value="{{$reason->id}}">{{$reason->reason_name}}</option>
                  @endforeach
              </select>
          </div>

          <div class="col-md-12">
            <strong>Priority: </strong>
            <select class="form-control" name="id_priority">
              <option selected value="{{$maintenance_plan->priority->id}}">{{$maintenance_plan->priority->priority_name}}</option>
                @foreach ($priorities as $priority)
              <option value="{{$priority->id}}">{{$priority->priority_name}}</option>
                @endforeach
            </select>
          </div>
          
          <div class="col-md-12">
            <strong>Frequency: </strong>
            <select class="form-control" name="id_frequency">
              <option selected value="{{$maintenance_plan->frequency->id}}">{{$maintenance_plan->frequency->frequency_name}}</option>
                @foreach ($frequencies as $frequency)
              <option value="{{$frequency->id}}">{{$frequency->frequency_name}}</option>
                @endforeach
            </select>
          </div>
          
          <div class="col-md-12">
          <strong>Description :</strong>
          <textarea class="form-control" name="description" rows="8" cols="80">{{$maintenance_plan->description}}</textarea>
        </div>

        <div class="col-md-12">
          <a href="{{route('maintenance_plan.index')}}" class="btn btn-sm btn-success">Back</a>
          <button type="submit" class="btn btn-sm btn-primary">Submit</button>
        </div> 
      </div>
    </form>
  </div>
@endsection