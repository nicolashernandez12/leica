@extends('layouts.app')
@section('content')

  <div class="container">
    <div class="row">
      <div class="col-md-10">
        <h3>List priority</h3>
      </div>
      <div class="col-sm-2">
        <a class="btn btn-sm btn-success" href="{{ route('priority.create')}}">Create New priority</a>
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

      @foreach ($priorities as $priority)
        <tr>
          <td><b>{{++$i}}.</b></td>
          <td>{{$priority->priority_name}}</td>
          <td>{{$priority->description}}</td>
          <td>
          <form action="{{route('priority.destroy', $priority->id)}}" method="post">
            <a class="btn btn-sm btn-success" href="{{route('priority.show',$priority->id)}}">Show</a>
              <a class="btn btn-sm btn-warning" href="{{route('priority.edit',$priority->id)}}">Edit</a>
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-sm btn-danger">Delete</button>
            </form>
          </td>
        </tr>
      @endforeach
    </table>

{!! $priorities->links() !!}
  </div>
@endsection