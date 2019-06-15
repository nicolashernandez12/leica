@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3>New lending</h3>
      </div>
    </div>

    @if ($errors->any())
      <div class="alert alert-danger">
        <strong>Whoops! </strong> there where some problems with your input.<br>
        <ul>
          @foreach ($errors as $error)
            <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{route('lending.store')}}" method="post">
      @csrf
      <div class="row">
       
        <div class="col-md-10">
            <strong>Name Liable: </strong>
            <select class="form-control" name="id_liable">
              @foreach ($liables as $liable)
                <option value="{{$liable->id}}">{{$liable->name_person}} {{$liable->last_name_person}}</option>
              @endforeach
            </select>
          </div>
          <div class="col-md-2">
              <a href="{{route('liable.create')}}" class="btn btn-sm btn-success">New Liable</a>
          </div>

        <div class="col-md-12">
          <strong>User: </strong>
          <select class="form-control" name="id_user">
            @foreach ($users as $user)
              <option value="{{$user->id}}">{{$user->liable->name_person}} {{$user->liable->last_name_person}}</option>
            @endforeach
          </select>
        </div>

        <div class="col-md-12">
            <strong>Loan Date:</strong>
            <input type="date" name="loan_date" class="form-control">
          </div>

        <div class="col-md-6">
            <strong>Supposed Return Date:</strong>
            <input type="date" name="supposed_return_date" class="form-control">
        </div>

        {{-- <div class="col-md-12">
            <strong>Real Return Date:</strong>
            <input type="date" name="real_return_date" class="form-control">
        </div> --}}

        <div class="col-md-12">
          <a href="{{route('lending.index')}}" class="btn btn-sm btn-success">Back</a>
          <button type="submit" class="btn btn-sm btn-primary">Submit</button>
        </div>
      </div>
    </form>

  </div>
@endsection