@extends('layouts.app')
@section('content')

  <div class="container">
    <div class="row">
      <div class="col-md-10">
        <h3>List Equipment Plan Study</h3>
      </div>
      <div class="col-sm-2">
        <a class="btn btn-sm btn-success" href="{{ route('equipment_plan_study.create')}}">Create New Equipment Plan Study</a>
      </div>
    </div>

    @if ($message = Session::get('success'))
      <div class="alert alert-success">
        <p>{{$message}}</p>
      </div>
    @endif

    <table class="table table-hover table-sm">
      <tr>
        <th width = "50px"><b>No.</b></th>
        <th>Study Plan</th>
        <th>Active Input</th>
        <th width = "180px">Action</th>
      </tr>
      
      @foreach ($equipment_plan_studies as $equipment_plan_study)
        <tr>
          <td><b>{{$equipment_plan_study->id}}.</b></td>
          <td>{{$equipment_plan_study->activeInput->input_name}}</td>
          <td>{{$equipment_plan_study->studyPlan->study_plan_name}}</td>
          <td>
          <form action="{{route('equipment_plan_study.destroy', $equipment_plan_study->id)}}" method="post">
            <a class="btn btn-sm btn-success" href="{{route('equipment_plan_study.show',$equipment_plan_study->id)}}">Show</a>
              <a class="btn btn-sm btn-warning" href="{{route('equipment_plan_study.edit',$equipment_plan_study->id)}}">Edit</a>
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-sm btn-danger">Delete</button>
            </form>
          </td>
        </tr>
      @endforeach
    </table>


  </div>
@endsection