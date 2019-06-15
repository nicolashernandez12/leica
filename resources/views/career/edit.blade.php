@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3>Edit Career</h3>
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

    <form action="{{route('career.update',$career->id)}}" method="post">
      @csrf
      @method('PUT')
      <div class="row">
        <div class="col-md-12">
          <strong>Name :</strong>
          <input type="text" name="career_name" class="form-control" value="{{$career->career_name}}">
        </div>
        <div class="col-md-12">
          <strong>Description :</strong>
          <textarea class="form-control" name="description" rows="8" cols="80">{{$career->description}}</textarea>
        </div>

        <div class="col-md-12">
          <a href="{{route('career.index')}}" class="btn btn-sm btn-success">Back</a>
          <button type="submit" class="btn btn-sm btn-primary">Submit</button>
        </div>
      </div>
    </form>
  </div>
@endsection