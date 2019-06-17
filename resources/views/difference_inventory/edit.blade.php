@extends('layouts.master')

@section('dentro_de_master')
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3>Edit Difference Inventory</h3>
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

    <form action="{{route('difference_inventory.update',$difference_inventory->id)}}" method="post">
      @csrf
      @method('PUT')
      <div class="row">
        <div class="col-md-12">
            <strong>Difference :</strong>
            <input type="number" name="difference" class="form-control" value="{{$difference_inventory->difference}}">
          </div>
        <div class="col-md-12">
          <strong>Inventory: </strong>
          <select class="form-control" name="id_inventory">
            <option selected value="{{$difference_inventory->inventory->id}}">{{$difference_inventory->inventory->activeInput->input_name}}</option>
              @foreach ($inventories as $inventory)
            <option value="{{$inventory->id}}">{{$inventory->activeInput->input_name}}</option>
              @endforeach
          </select>
      </div>

          <div class="col-md-12">
            <strong>Inventory Process: </strong>
            <select class="form-control" name="id_inventory_process">
              <option selected value="{{$difference_inventory->inventoryProcess->id}}">{{$difference_inventory->inventoryProcess->date_execution}}</option>
                @foreach ($inventory_processes as $inventory_process)
              <option value="{{$inventory_process->id}}">{{$inventory_process->date_execution}}</option>
                @endforeach
            </select>
          </div>

        <div class="col-md-12">
          <a href="{{route('difference_inventory.index')}}" class="btn btn-sm btn-success">Back</a>
          <button type="submit" class="btn btn-sm btn-primary">Submit</button>
        </div> 
      </div>
    </form>
  </div>
@endsection