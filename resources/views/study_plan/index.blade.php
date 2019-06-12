@extends('layouts.app')
@section('content')

  <div class="container">
    <div class="row">
      <div class="col-md-10">
        <h3>List Study plan</h3>
      </div>
      <div class="col-sm-2">
        <a class="btn btn-sm btn-success" href="{{ route('study_plan.create')}}">Create New Study plan</a>
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
        <th width = "300px">Name Study Plan</th>
        <th>Career Name</th>
        <th>Date Start</th>
        <th>Date End</th>
        <th width = "180px">Action</th>
      </tr>
      
      @foreach ($study_plans as $study_plan)
        <tr>
          <td><b>{{$study_plan->id}}.</b></td>
          <td>{{$study_plan->study_plan_name}}</td>
          <td>{{$study_plan->career->career_name}}</td>
          <td>{{$study_plan->date_start}}</td>
          <td>{{$study_plan->date_end}}</td>
          <td>
          <form action="{{route('study_plan.destroy', $study_plan->id)}}" method="post">
            <a class="btn btn-sm btn-success" href="{{route('study_plan.show',$study_plan->id)}}">Show</a>
              <a class="btn btn-sm btn-warning" href="{{route('study_plan.edit',$study_plan->id)}}">Edit</a>
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