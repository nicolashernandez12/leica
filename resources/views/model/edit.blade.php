@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3>Edit model</h3>
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

    <form action="{{route('model.update',$model->id)}}" method="post">
      @csrf
      @method('PUT')
      <div class="row">
        <div class="col-md-12">
          <strong>Name :</strong>
          <input type="text" name="model_name" class="form-control" value="{{$model->model_name}}">
        </div>
        <div class="row">
              <div class="col-md-12">
                <strong>trademark: </strong>
                <select class="form-control" name="id_trademark">
                  <option selected value="{{$model->trademark->id}}">{{$model->trademark->trademark_name}}</option>
                  @foreach ($trademarks as $trademark)
                  <option value="{{$trademark->id}}">{{$trademark->trademark_name}}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
        <div class="col-md-12">
          <strong>Description :</strong>
          <textarea class="form-control" name="description" rows="8" cols="80">{{$model->description}}</textarea>
        </div>

        <div class="col-md-12">
          <a href="{{route('model.index')}}" class="btn btn-sm btn-success">Back</a>
          <button type="submit" class="btn btn-sm btn-primary">Submit</button>
        </div>
      </div>
    </form>
  </div>
@endsection