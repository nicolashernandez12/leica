@extends('layouts.master')

@section('dentro_de_master')
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3>Edit type shrinkage</h3>
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

    <form action="{{route('type_shrinkage.update',$type_shrinkage->id)}}" method="post">
      @csrf
      @method('PUT')
      <div class="row">
        <div class="col-md-12">
          <strong>Name :</strong>
          <input type="text" name="type_shrinkage_name" class="form-control" value="{{$type_shrinkage->type_shrinkage_name}}">
        </div>
        <div class="col-md-12">
          <strong>Description :</strong>
          <textarea class="form-control" name="description" rows="8" cols="80">{{$type_shrinkage->description}}</textarea>
        </div>

        <div class="col-md-12">
          <a href="{{route('type_shrinkage.index')}}" class="btn btn-sm btn-success">Back</a>
          <button type="submit" class="btn btn-sm btn-primary">Submit</button>
        </div>
      </div>
    </form>
  </div>
@endsection