@extends('layouts.app')
@section('content')

  <div class="container">
    <div class="row">
      <div class="col-md-10">
        <h3>List Inventory Process</h3>
      </div>
      <div class="col-sm-2">
        <a class="btn btn-sm btn-success" href="{{ route('inventory_process.create')}}">Create New Inventory Process</a>
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
        <th>Date Execution</th>
        <th>Type Inventory</th>
        <th width = "180px">Action</th>
      </tr>
      
      @foreach ($inventory_processes as $inventory_process)
        <tr>
          <td><b>{{$inventory_process->id}}.</b></td>
          <td>{{$inventory_process->date_execution}}</td>
          <td>{{$inventory_process->typeInventory->type_inventory_name}}</td>
          <td>
          <form action="{{route('inventory_process.destroy', $inventory_process->id)}}" method="post">
            <a class="btn btn-sm btn-success" href="{{route('inventory_process.show',$inventory_process->id)}}">Show</a>
              <a class="btn btn-sm btn-warning" href="{{route('inventory_process.edit',$inventory_process->id)}}">Edit</a>
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