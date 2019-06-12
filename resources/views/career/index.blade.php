@extends('layouts.app')
@section('content')

  <div class="container">
    <div class="row">
      <div class="col-md-10">
        <h3>List Career</h3>
      </div>
      <div class="col-sm-2">
        <a class="btn btn-sm btn-success" href="{{ route('career.create')}}">Create New Career</a>
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

      @foreach ($careers as $career)
        <tr>
          <td><b>{{++$i}}.</b></td>
          <td>{{$career->career_name}}</td>
          <td>{{$career->description}}</td>
          <td>
          <form action="{{route('career.destroy', $career->id)}}" method="post">
            <a class="btn btn-sm btn-success" href="{{route('career.show',$career->id)}}">Show</a>
              <a class="btn btn-sm btn-warning" href="{{route('career.edit',$career->id)}}">Edit</a>
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-sm btn-danger">Delete</button>
            </form>
          </td>
        </tr>
      @endforeach
    </table>

{!! $careers->links() !!}
  </div>
@endsection