@extends('layouts.app')
@section('content')

  <div class="container">
    <div class="row">
      <div class="col-md-10">
        <h3>List software type</h3>
      </div>
      <div class="col-sm-2">
        <a class="btn btn-sm btn-success" href="{{ route('software_type.create')}}">Create New software type</a>
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

      @foreach ($software_types as $software_type)
        <tr>
          <td><b>{{++$i}}.</b></td>
          <td>{{$software_type->software_type_name}}</td>
          <td>{{$software_type->description}}</td>
          <td>
          <form action="{{route('software_type.destroy', $software_type->id)}}" method="post">
            <a class="btn btn-sm btn-success" href="{{route('software_type.show',$software_type->id)}}">Show</a>
              <a class="btn btn-sm btn-warning" href="{{route('software_type.edit',$software_type->id)}}">Edit</a>
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-sm btn-danger">Delete</button>
            </form>
          </td>
        </tr>
      @endforeach
    </table>

{!! $software_types->links() !!}
  </div>
@endsection