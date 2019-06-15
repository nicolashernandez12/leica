@extends('layouts.app')
@section('content')

  <div class="container">
    <div class="row">
      <div class="col-md-10">
        <h3>List type inventory</h3>
      </div>
      <div class="col-sm-2">
        <a class="btn btn-sm btn-success" href="{{ route('type_inventory.create')}}">Create New type inventory</a>
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
        <th width = "300px">Name</th>
        <th>Description</th>
        <th width = "180px">Action</th>
      </tr>

      @foreach ($type_inventories as $type_inventory)
        <tr>
          <td><b>{{++$i}}.</b></td>
          <td>{{$type_inventory->type_inventory_name}}</td>
          <td>{{$type_inventory->description}}</td>
          <td>
          <form action="{{route('type_inventory.destroy', $type_inventory->id)}}" method="post">
            <a class="btn btn-sm btn-success" href="{{route('type_inventory.show',$type_inventory->id)}}">Show</a>
              <a class="btn btn-sm btn-warning" href="{{route('type_inventory.edit',$type_inventory->id)}}">Edit</a>
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-sm btn-danger">Delete</button>
            </form>
          </td>
        </tr>
      @endforeach
    </table>

{!! $type_inventories->links() !!}
  </div>
@endsection