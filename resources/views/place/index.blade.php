@extends('layouts.app')
@section('content')

  <div class="container">
    <div class="row">
      <div class="col-md-10">
        <h3>List place</h3>
      </div>
      <div class="col-sm-2">
        <a class="btn btn-sm btn-success" href="{{ route('place.create')}}">Create New place</a>
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

      @foreach ($places as $place)
        <tr>
          <td><b>{{++$i}}.</b></td>
          <td>{{$place->place_name}}</td>
          <td>{{$place->description}}</td>
          <td>
          <form action="{{route('place.destroy', $place->id)}}" method="post">
            <a class="btn btn-sm btn-success" href="{{route('place.show',$place->id)}}">Show</a>
              <a class="btn btn-sm btn-warning" href="{{route('place.edit',$place->id)}}">Edit</a>
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-sm btn-danger">Delete</button>
            </form>
          </td>
        </tr>
      @endforeach
    </table>

{!! $places->links() !!}
  </div>
@endsection