@extends('layouts.master')

@section('dentro_de_master')

  <div class="container">
    <div class="row">
      <div class="col-md-10">
        <h3>List reason</h3>
      </div>
      <div class="col-sm-2">
        <a class="btn btn-sm btn-success" href="{{ route('reason.create')}}">Create New reason</a>
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

      @foreach ($reasons as $reason)
        <tr>
          <td><b>{{++$i}}.</b></td>
          <td>{{$reason->reason_name}}</td>
          <td>{{$reason->description}}</td>
          <td>
          <form action="{{route('reason.destroy', $reason->id)}}" method="post">
            <a class="btn btn-sm btn-success" href="{{route('reason.show',$reason->id)}}">Show</a>
              <a class="btn btn-sm btn-warning" href="{{route('reason.edit',$reason->id)}}">Edit</a>
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-sm btn-danger">Delete</button>
            </form>
          </td>
        </tr>
      @endforeach
    </table>

{!! $reasons->links() !!}
  </div>
@endsection