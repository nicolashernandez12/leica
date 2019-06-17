@extends('layouts.master')

@section('dentro_de_master')
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3>Edit Liable</h3>
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

    <form action="{{route('liable.update',$liable->id)}}" method="post">
      @csrf
      @method('PUT')
      <div class="row">
          <div class="col-md-12">
              <strong>Name:</strong>
              <input type="text" name="name_person" class="form-control" value="{{$liable->name_person}}">
          </div>

          <div class="col-md-12">
              <strong>Last Name:</strong>
              <input type="text" name="last_name_person" class="form-control" value="{{$liable->last_name_person}}">
          </div>

          <div class="col-md-12">
              <strong>rut:</strong>
              <input type="text" name="rut" class="form-control" value="{{$liable->rut}}">
          </div>
          
          <div class="col-md-12">
            <strong>Position: </strong>
            <select class="form-control" name="id_position">
              <option selected value="{{$liable->position->id}}">{{$liable->position->position_name}}</option>
                @foreach ($positions as $position)
              <option value="{{$position->id}}">{{$position->position_name}}</option>
                @endforeach
            </select>
          </div>
          

        <div class="col-md-12">
          <a href="{{route('liable.index')}}" class="btn btn-sm btn-success">Back</a>
          <button type="submit" class="btn btn-sm btn-primary">Submit</button>
        </div> 
      </div>
    </form>
  </div>
@endsection