@extends('layouts.app')
@section('content')

  <div class="container">
    <div class="row">
      <div class="col-md-10">
        <h3>List trademark</h3>
      </div>
      <div class="col-sm-2">
        <a class="btn btn-sm btn-success" href="{{ route('trademark.create')}}">Create New trademark</a>
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

      @foreach ($trademarks as $trademark)
        <tr>
          <td><b>{{++$i}}.</b></td>
          <td>{{$trademark->trademark_name}}</td>
          <td>{{$trademark->description}}</td>
          <td>
          <form action="{{route('trademark.destroy', $trademark->id)}}" method="post">
            <a class="btn btn-sm btn-success" href="{{route('trademark.show',$trademark->id)}}">Show</a>
              <a class="btn btn-sm btn-warning" href="{{route('trademark.edit',$trademark->id)}}">Edit</a>
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-sm btn-danger">Delete</button>
            </form>
          </td>
        </tr>
      @endforeach
    </table>

{!! $trademarks->links() !!}
  </div>
@endsection