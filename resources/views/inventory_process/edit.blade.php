@extends('layouts.master')

@section('dentro_de_master')
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3>Edit Inventory Process</h3>
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

    <form action="{{route('inventory_process.update',$inventory_process->id)}}" method="post">
      @csrf
      @method('PUT')
      <div class="row">
          <div class="col-md-12">
              <strong>Date Execution:</strong>
              <input type="date" name="date_execution" class="form-control" value="{{$inventory_process->date_execution}}">
          </div>

          <div class="col-md-12">
              <strong>Type Inventory: </strong>
              <select class="form-control" name="id_type_inventory">
                <option selected value="{{$inventory_process->typeInventory->id}}">{{$inventory_process->typeInventory->type_inventory_name}}</option>
                  @foreach ($type_inventories as $type_inventory)
                <option value="{{$type_inventory->id}}">{{$type_inventory->type_inventory_name}}</option>
                  @endforeach
              </select>
          </div>

        <div class="col-md-12">
          <a href="{{route('inventory_process.index')}}" class="btn btn-sm btn-success">Back</a>
          <button type="submit" class="btn btn-sm btn-primary">Submit</button>
        </div> 
      </div>
    </form>
  </div>
@endsection