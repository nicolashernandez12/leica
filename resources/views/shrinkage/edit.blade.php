@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3>Edit Shrinkage</h3>
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

    <form action="{{route('shrinkage.update',$shrinkage->id)}}" method="post">
      @csrf
      @method('PUT')
      <div class="row">

          <div class="col-md-12">
              <strong>Inventory: </strong>
              <select class="form-control" name="id_inventory">
                <option selected value="{{$shrinkage->inventory->id}}">{{$shrinkage->inventory->activeInput->input_name}}</option>
                  @foreach ($inventories as $inventory)
                <option value="{{$inventory->id}}">{{$inventory->activeInput->input_name}}</option>
                  @endforeach
              </select>
          </div>

          <div class="col-md-12">
            <strong>Type Shrinkage: </strong>
            <select class="form-control" name="id_type_shrinkage">
              <option selected value="{{$shrinkage->typeShrinkage->id}}">{{$shrinkage->typeShrinkage->type_shrinkage_name}}</option>
                @foreach ($type_shrinkages as $type_shrinkage)
              <option value="{{$type_shrinkage->id}}">{{$type_shrinkage->type_shrinkage_names}}</option>
                @endforeach
            </select>
          </div>

        <div class="col-md-12">
          <a href="{{route('shrinkage.index')}}" class="btn btn-sm btn-success">Back</a>
          <button type="submit" class="btn btn-sm btn-primary">Submit</button>
        </div> 
      </div>
    </form>
  </div>
@endsection