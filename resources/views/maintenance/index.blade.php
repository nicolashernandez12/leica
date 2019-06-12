@extends('layouts.app')
@section('content')

  <div class="container">
    <div class="row">
      <div class="col-md-10">
        <h3>List maintenance</h3>
      </div>
      <div class="col-sm-2">
        <a class="btn btn-sm btn-success" href="{{ route('maintenance.create')}}">Create New maintenance</a>
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
        <th>User Name</th>
        <th>Inventory</th>
        <th>Date Maintenance</th>
        <th width = "180px">Action</th>
      </tr>
      
      @foreach ($maintenances as $maintenance)
        <tr>
          <td><b>{{$maintenance->id}}.</b></td>
          <td>{{$maintenance->userData->liable->name_person}} {{$maintenance->userData->liable->last_name_person}}</td>
          <td>{{$maintenance->inventory->activeInput->input_name}}</td>
          <td>{{$maintenance->date_maintenance}}</td>
          <td>
          <form action="{{route('maintenance.destroy', $maintenance->id)}}" method="post">
            <a class="btn btn-sm btn-success" href="{{route('maintenance.show',$maintenance->id)}}">Show</a>
              <a class="btn btn-sm btn-warning" href="{{route('maintenance.edit',$maintenance->id)}}">Edit</a>
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