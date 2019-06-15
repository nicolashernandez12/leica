@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3>New Maintenance Plan</h3>
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

    <form action="{{route('maintenance_plan.store')}}" method="post">
      @csrf
      <div class="row">
      <div class="col-md-12">
          <strong>Nombre:</strong>
          <input type="text" name="maintenance_plan_name" class="form-control" placeholder="maintenance plan name">
        </div>
        <div class="col-md-12">
          <strong>Descripcion :</strong>
          <textarea class="form-control" placeholder="description" name="description" rows="8" cols="80"></textarea>
        </div>
        
        <div class="row">
          <div class="col-md-12">
            <strong>frequency: </strong>
            <select class="form-control" name="id_frequency">
              @foreach ($frequencies as $frequency)
              <option value="{{$frequency->id}}">{{$frequency->frequency_name}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <strong>priority: </strong>
            <select class="form-control" name="id_priority">
              @foreach ($priorities as $priority)
              <option value="{{$priority->id}}">{{$priority->priority_name}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="col-md-12">
          <a href="{{route('maintenance_plan.index')}}" class="btn btn-sm btn-success">Back</a>
          <button type="submit" class="btn btn-sm btn-primary">Submit</button>
        </div>
      </div>
    </form>

  </div>
@endsection