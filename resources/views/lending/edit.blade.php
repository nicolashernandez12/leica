@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3>Edit lending</h3>
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

    <form action="{{route('lending.update',$lending->id)}}" method="post">
      @csrf
      @method('PUT')
      <div class="row">
          
          <div class="col-md-12">
            <strong>User: </strong>
            <select class="form-control" name="id_user">
              <option selected value="{{$lending->userData->id}}">{{$lending->userData->liable->name_person}} {{$lending->userData->liable->last_name_person}}</option>
                @foreach ($users as $user)
              <option value="{{$user->id}}">{{$user->liable->name_person}} {{$user->liable->last_name_person}}</option>
                @endforeach
            </select>
          </div>

          <div class="col-md-12">
              <strong>Liable: </strong>
              <select class="form-control" name="id_liable">
                <option selected value="{{$lending->liable->id}}">{{$lending->liable->name_person}}</option>
                  @foreach ($liables as $liable)
                <option value="{{$liable->id}}">{{$liable->name_person}}</option>
                  @endforeach
              </select>
            </div>

            <div class="col-md-12">
                <strong>Loan Date:</strong>
                <input type="date" name="loan_date" class="form-control" value="{{$lending->loan_date}}">
            </div>

            <div class="col-md-12">
                <strong>Supposed Return Date::</strong>
                <input type="date" name="supposed_return_date" class="form-control" value="{{$lending->supposed_return_date}}">
            </div>

            <div class="col-md-12">
                <strong>Real Return Date:</strong>
                <input type="date" name="real_return_date" class="form-control" value="{{$lending->real_return_date}}">
            </div>
          

        <div class="col-md-12">
          <a href="{{route('lending.index')}}" class="btn btn-sm btn-success">Back</a>
          <button type="submit" class="btn btn-sm btn-primary">Submit</button>
        </div> 
      </div>
    </form>
  </div>
@endsection