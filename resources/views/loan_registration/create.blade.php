@extends('layouts.master')

@section('dentro_de_master')
{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3>New Loan Registration</h3>
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

    <form action="{{route('loan_registration.store')}}" method="post">
      @csrf
      <div class="row">

      <div class="col-md-12">
          <strong>Inventory </strong>
          <select class="form-control" name="id_inventory">
            @foreach ($inventories as $inventory)
            <option value="{{$inventory->id}}">{{$inventory->activeInput->input_name}}</option>
            @endforeach
          </select>
      </div>

      <div class="col-md-12">
        <strong>Lending: </strong>
        <select class="form-control" name="id_lending">
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