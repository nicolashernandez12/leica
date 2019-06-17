@extends('layouts.master')

@section('dentro_de_master')

  <div class="container">
    <div class="row">
      <div class="col-md-10">
        <h3>List model</h3>
      </div>
      <div class="col-sm-2">
        <a class="btn btn-sm btn-success" href="{{ route('model.create')}}">Create New model</a>
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
        <th>Trademark name</th>
        <th width = "180px">Action</th>
      </tr>

      @foreach ($models as $model)
        <tr>
          <td><b>{{$model->id}}.</b></td>
          <td>{{$model->model_name}}</td>
          <td>{{$model->trademark->trademark_name}}</td>
          <td>
          <form action="{{route('model.destroy', $model->id)}}" method="post">
            <a class="btn btn-sm btn-success" href="{{route('model.show',$model->id)}}">Show</a>
              <a class="btn btn-sm btn-warning" href="{{route('model.edit',$model->id)}}">Edit</a>
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