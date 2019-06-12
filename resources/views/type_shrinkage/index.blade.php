@extends('layouts.app')
@section('content')

  <div class="container">
    <div class="row">
      <div class="col-md-10">
        <h3>List type shrinkage</h3>
      </div>
      <div class="col-sm-2">
        <a class="btn btn-sm btn-success" href="{{ route('type_shrinkage.create')}}">Create New type_shrinkage</a>
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

      @foreach ($type_shrinkages as $type_shrinkage)
        <tr>
          <td><b>{{++$i}}.</b></td>
          <td>{{$type_shrinkage->type_shrinkage_name}}</td>
          <td>{{$type_shrinkage->description}}</td>
          <td>
          <form action="{{route('type_shrinkage.destroy', $type_shrinkage->id)}}" method="post">
            <a class="btn btn-sm btn-success" href="{{route('type_shrinkage.show',$type_shrinkage->id)}}">Show</a>
              <a class="btn btn-sm btn-warning" href="{{route('type_shrinkage.edit',$type_shrinkage->id)}}">Edit</a>
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-sm btn-danger">Delete</button>
            </form>
          </td>
        </tr>
      @endforeach
    </table>

{!! $type_shrinkages->links() !!}
  </div>
@endsection