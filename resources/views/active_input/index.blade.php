@extends('layouts.app')
@section('content')

  <div class="container">
    <div class="row">
      <div class="col-md-10">
        <h3>List active input</h3>
      </div>
      <div class="col-sm-2">
        <a class="btn btn-sm btn-success" href="{{ route('active_input.create')}}">Create New active_input</a>
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
        <th>UF value</th>
        <th>Model</th>
        <th>Trademark</th>
        <th width = "180px">Action</th>
      </tr>

      @foreach ($active_inputs as $active_input)
        <tr>
          <td><b>{{$active_input->id}}.</b></td>
          <td>{{$active_input->input_name}}</td>
          <td>{{$active_input->uf_value}}</td>
          <td>{{$active_input->model->model_name}}</td>
          <td>{{$active_input->model->trademark->trademark_name}}</td>
          <td>
          <form action="{{route('active_input.destroy', $active_input->id)}}" method="post">
            <a class="btn btn-sm btn-success" href="{{route('active_input.show',$active_input->id)}}">Show</a>
              <a class="btn btn-sm btn-warning" href="{{route('active_input.edit',$active_input->id)}}">Edit</a>
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