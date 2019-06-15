@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3>Edit Software</h3>
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

    <form action="{{route('software.update',$software->id)}}" method="post">
      @csrf
      @method('PUT')
      <div class="row">
          <div class="col-md-12">
              <strong>Software Name:</strong>
              <input type="text" name="name_software" class="form-control" value="{{$software->name_software}}">
          </div>

          <div class="col-md-12">
            <strong>Version:</strong>
            <input type="text" name="version" class="form-control" value="{{$software->version}}">
        </div>

          <div class="col-md-12">
              <strong>Software Type: </strong>
              <select class="form-control" name="id_software_type">
                <option selected value="{{$software->softwareType->id}}">{{$software->softwareType->software_type_name}}</option>
                  @foreach ($software_types as $software_type)
                <option value="{{$software_type->id}}">{{$software_type->software_type_name}}</option>
                  @endforeach
              </select>
          </div>

          <div class="col-md-12">
            <strong>Inventory: </strong>
            <select class="form-control" name="id_inventory">
              <option selected value="{{$software->inventory->id}}">{{$software->inventory->activeInput->input_name}}</option>
                @foreach ($inventories as $inventory)
              <option value="{{$inventory->id}}">{{$inventory->inventory_name}}</option>
                @endforeach
            </select>
          </div>
          
          <div class="col-md-12">
          <strong>Description :</strong>
          <textarea class="form-control" name="description" rows="4" cols="80">{{$software->description}}</textarea>
        </div>

        <div class="col-md-12">
          <strong>Observation :</strong>
          <textarea class="form-control" name="observation" rows="4" cols="80">{{$software->observation}}</textarea>
        </div>

        <div class="col-md-12">
          <a href="{{route('software.index')}}" class="btn btn-sm btn-success">Back</a>
          <button type="submit" class="btn btn-sm btn-primary">Submit</button>
        </div> 
      </div>
    </form>
  </div>
@endsection