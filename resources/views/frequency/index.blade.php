@extends('layouts.app')
@section('content')

  <div class="container">
    <div class="row">
      <div class="col-md-10">
        <h3>List frequency</h3>
      </div>
      <div class="col-sm-2">
        <a class="btn btn-sm btn-success" href="{{ route('frequency.create')}}">Create New frequency</a>
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

      @foreach ($frequencies as $frequency)
        <tr>
          <td><b>{{++$i}}.</b></td>
          <td>{{$frequency->frequency_name}}</td>
          <td>{{$frequency->description}}</td>
          <td>
          <form action="{{route('frequency.destroy', $frequency->id)}}" method="post">
            <a class="btn btn-sm btn-success" href="{{route('frequency.show',$frequency->id)}}">Show</a>
              <a class="btn btn-sm btn-warning" href="{{route('frequency.edit',$frequency->id)}}">Edit</a>
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-sm btn-danger">Delete</button>
            </form>
          </td>
        </tr>
      @endforeach
    </table>

{!! $frequencies->links() !!}
  </div>
@endsection