@extends('layouts.app')
@section('content')

  <div class="container">
    <div class="row">
      <div class="col-md-10">
        <h3>List lending</h3>
      </div>
      <div class="col-sm-2">
        <a class="btn btn-sm btn-success" href="{{ route('lending.create')}}">Create New lending</a>
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
        <th>Name Liable</th>
        <th>Name User</th>
        <th>Loan Date</th>
        <th>Supposed Return Date</th>
        <th>Real Return Date</th>
        <th width = "180px">Action</th>
      </tr>
      
      @foreach ($lendings as $lending)
        <tr>
          <td><b>{{$lending->id}}.</b></td>
          <td>{{$lending->liable->name_person}} {{$lending->liable->last_name_person}}</td>
          <td>{{$lending->userData->liable->name_person}} {{$lending->userData->liable->last_name_person}}</td>
          <td>{{$lending->loan_date}}</td>
          <td>{{$lending->supposed_return_date}}</td>
          <td>{{$lending->real_return_date}}</td>
          <td>
          <form action="{{route('lending.destroy', $lending->id)}}" method="post">
            <a class="btn btn-sm btn-success" href="{{route('lending.show',$lending->id)}}">Show</a>
              <a class="btn btn-sm btn-warning" href="{{route('lending.edit',$lending->id)}}">Edit</a>
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