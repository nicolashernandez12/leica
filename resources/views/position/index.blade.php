@extends('layouts.app')
@section('content')

  <div class="container">
    <div class="row">
      <div class="col-md-10">
        <h3>List position</h3>
      </div>
      <div class="col-sm-2">
        <a class="btn btn-sm btn-success" href="{{ route('position.create')}}">Create New position</a>
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

      @foreach ($positions as $position)
        <tr>
          <td><b>{{++$i}}.</b></td>
          <td>{{$position->position_name}}</td>
          <td>{{$position->description}}</td>
          <td>
          <form action="{{route('position.destroy', $position->id)}}" method="post">
            <a class="btn btn-sm btn-success" href="{{route('position.show',$position->id)}}">Show</a>
              <a class="btn btn-sm btn-warning" href="{{route('position.edit',$position->id)}}">Edit</a>
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-sm btn-danger">Delete</button>
            </form>
          </td>
        </tr>
      @endforeach
    </table>

{!! $positions->links() !!}
  </div>
@endsection