@extends('layouts.master')

@section('dentro_de_master')
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3>Edit Loan Registration</h3>
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

    <form action="{{route('loan_registration.update',$loan_registration->id)}}" method="post">
      @csrf
      @method('PUT')
      <div class="row">

        <div class="col-md-12">
          <strong>Inventory: </strong>
          <select class="form-control" name="id_inventory">
            <option selected value="{{$loan_registration->inventory->id}}">{{$loan_registration->inventory->activeInput->input_name}}</option>
              @foreach ($inventories as $inventory)
            <option value="{{$inventory->id}}">{{$inventory->activeInput->input_name}}</option>
              @endforeach
          </select>
      </div>

          <div class="col-md-12">
            <strong>Liable: </strong>
            <select class="form-control" name="id_lending">
              <option selected value="{{$loan_registration->lending->id}}">{{$loan_registration->lending->liable->name_person}}</option>
                @foreach ($lendings as $lending)
              <option value="{{$lending->id}}">{{$lending->liable->name_person}}</option>
                @endforeach
            </select>
          </div>

        <div class="col-md-12">
          <a href="{{route('loan_registration.index')}}" class="btn btn-sm btn-success">Back</a>
          <button type="submit" class="btn btn-sm btn-primary">Submit</button>
        </div> 
      </div>
    </form>
  </div>
@endsection