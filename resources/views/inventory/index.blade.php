@extends('layouts.app')
@section('content')

  <div class="container">
    <div class="row">
      <div class="col-md-10">
        <h3>List Inventory</h3>
      </div>
      <div class="col-sm-2">
        <a class="btn btn-sm btn-success" href="{{ route('inventory.create')}}">Create New Inventory</a>
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
        <th>Name Active Input</th>
        <th>quantity</th>
        <th>State</th>
        <th width = "180px">Action</th>
      </tr>
      
      @foreach ($inventories as $inventory)
        <tr>
          <td><b>{{$inventory->id}}.</b></td>
          <td>{{$inventory->activeInput->input_name}}</td>
          <td>{{$inventory->quantity}}</td>
          <td>{{$inventory->state->state_name}}</td>
          <td>
          <form action="{{route('inventory.destroy', $inventory->id)}}" method="post">
            <a class="btn btn-sm btn-success" href="{{route('inventory.show',$inventory->id)}}">Show</a>
              <a class="btn btn-sm btn-warning" href="{{route('inventory.edit',$inventory->id)}}">Edit</a>
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