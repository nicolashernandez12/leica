@extends('layouts.app')
@section('content')

  <div class="container">
    <div class="row">
      <div class="col-md-10">
        <h3>List Shrinkage</h3>
      </div>
      <div class="col-sm-2">
        <a class="btn btn-sm btn-success" href="{{ route('shrinkage.create')}}">Create New Shrinkage</a>
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
        <th>Inventory</th>
        <th>Type Shrinkage</th>
        <th width = "180px">Action</th>
      </tr>
      
      @foreach ($shrinkages as $shrinkage)
        <tr>
          <td><b>{{$shrinkage->id}}.</b></td>
          <td>{{$shrinkage->inventory->activeInput->input_name}}</td>
          <td>{{$shrinkage->typeShrinkage->type_shrinkage_name}}</td>
          <td>
          <form action="{{route('shrinkage.destroy', $shrinkage->id)}}" method="post">
            <a class="btn btn-sm btn-success" href="{{route('shrinkage.show',$shrinkage->id)}}">Show</a>
              <a class="btn btn-sm btn-warning" href="{{route('shrinkage.edit',$shrinkage->id)}}">Edit</a>
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