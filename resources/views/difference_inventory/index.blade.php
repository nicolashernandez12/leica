@extends('layouts.master')

@section('dentro_de_master')
  <div class="container">
    <div class="row">
      <div class="col-md-10">
        <h3>List Difference Inventory</h3>
      </div>
      <div class="col-sm-2">
        <a class="btn btn-sm btn-success" href="{{ route('difference_inventory.create')}}">Create New Difference Inventory</a>
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
        <th>Difference</th>
        <th>Inventory</th>
        <th>Date Execution</th>
        <th width = "180px">Action</th>
      </tr>
      
      @foreach ($difference_inventories as $difference_inventory)
        <tr>
          <td><b>{{$difference_inventory->id}}.</b></td>
          <td>{{$difference_inventory->difference}}</td>
          <td>{{$difference_inventory->inventory->activeInput->input_name}}</td>
          <td>{{$difference_inventory->inventoryProcess->date_execution}}</td>
          <td>
          <form action="{{route('difference_inventory.destroy', $difference_inventory->id)}}" method="post">
            <a class="btn btn-sm btn-success" href="{{route('difference_inventory.show',$difference_inventory->id)}}">Show</a>
              <a class="btn btn-sm btn-warning" href="{{route('difference_inventory.edit',$difference_inventory->id)}}">Edit</a>
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