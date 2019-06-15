@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3>Edit maintenance</h3>
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

    <form action="{{route('maintenance.update',$maintenance->id)}}" method="post">
      @csrf
      @method('PUT')
      <div class="row">
          
          <div class="col-md-12">
            <strong>Usuario: </strong>
            <select class="form-control" name="id_user">
              <option selected value="{{$maintenance->id_user}}">{{$maintenance->userData->liable->name_person}} {{$maintenance->userData->liable->last_name_person}}</option>
              @foreach ($users as $user)
              <option value="{{$user->id}}">{{$user->liable->name_person}} {{$user->liable->last_name_person}}</option>
            @endforeach
            </select>
          </div>

          <div class="col-md-12">
            <strong>Inventario: </strong>
            <select class="form-control" name="id_inventory">
              <option selected value="{{$maintenance->id_inventory}}">{{$maintenance->inventory->activeInput->input_name}}</option>
                @foreach ($inventories as $inventory)
              <option value="{{$inventory->id}}">{{$inventory->activeInput->input_name}}</option>
                @endforeach
            </select>
          </div>

          <div class="col-md-12">
            <strong>Razon: </strong>
            <select class="form-control" name="id_reason">
              <option selected value="{{$maintenance->id_reason}}">{{$maintenance->reason->reason_name}}</option>
                @foreach ($reasons as $reason)
              <option value="{{$reason->id}}">{{$reason->reason_name}}</option>
                @endforeach
            </select>
          </div>
          
          <div class="col-md-12">
            <strong>Date Mainenance:</strong>
            <input type="date" name="date_maintenance" class="form-control" value="{{$maintenance->date_maintenance}}">
        </div>

        <div class="col-md-12">
          <a href="{{route('maintenance.index')}}" class="btn btn-sm btn-success">Back</a>
          <button type="submit" class="btn btn-sm btn-primary">Submit</button>
        </div> 
      </div>
    </form>
  </div>
@endsection