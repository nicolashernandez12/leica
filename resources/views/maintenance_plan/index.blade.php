@extends('layouts.app')
@section('content')

  <div class="container">
    <div class="row">
      <div class="col-md-10">
        <h3>List Maintenance Plan</h3>
      </div>
      <div class="col-sm-2">
        <a class="btn btn-sm btn-success" href="{{ route('maintenance_plan.create')}}">Create New Maintenance Plan</a>
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
        <th>Name</th>
        <th>Reason</th>
        <th>Priority</th>
        <th>Frequency</th>
        <th width = "180px">Action</th>
      </tr>
      
      @foreach ($maintenance_plans as $maintenance_plan)
        <tr>
          <td><b>{{$maintenance_plan->id}}.</b></td>
          <td>{{$maintenance_plan->maintenance_plan_name}}</td>
          <td>{{$maintenance_plan->reason->reason_name}}</td>
          <td>{{$maintenance_plan->priority->priority_name}}</td>
          <td>{{$maintenance_plan->frequency->frequency_name}}</td>
          <td>
          <form action="{{route('maintenance_plan.destroy', $maintenance_plan->id)}}" method="post">
            <a class="btn btn-sm btn-success" href="{{route('maintenance_plan.show',$maintenance_plan->id)}}">Show</a>
              <a class="btn btn-sm btn-warning" href="{{route('maintenance_plan.edit',$maintenance_plan->id)}}">Edit</a>
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