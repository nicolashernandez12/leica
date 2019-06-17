@extends('layouts.master')

@section('dentro_de_master')

  <div class="container">
    <div class="row">
      <div class="col-md-10">
        <h3>List Loan Registration</h3>
      </div>
      <div class="col-sm-2">
        <a class="btn btn-sm btn-success" href="{{ route('loan_registration.create')}}">Create New Loan Registration</a>
      </div>
    </div>

    @if ($message = Session::get('success'))
      <div class="alert alert-success">
        <p>{{$message}}</p>
      </div>
    @endif

    <table class="table table-hover table-sm">
      <tr>
        <th width = "50px"><b>No.</b></th>
        <th>Inventory</th>
        <th>Lending</th>
        <th width = "180px">Action</th>
      </tr>
      
      @foreach ($loan_registrations as $loan_registration)
        <tr>
          <td><b>{{$loan_registration->id}}.</b></td>
          <td>{{$loan_registration->inventory->activeInput->input_name}}</td>
          <td>{{$loan_registration->lending->liable->name_person}}</td>
          <td>
          <form action="{{route('loan_registration.destroy', $loan_registration->id)}}" method="post">
            <a class="btn btn-sm btn-success" href="{{route('loan_registration.show',$loan_registration->id)}}">Show</a>
              <a class="btn btn-sm btn-warning" href="{{route('loan_registration.edit',$loan_registration->id)}}">Edit</a>
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-sm btn-danger">Delete</button>
            </form>
          </td>
        </tr>
      @endforeach
    </table>


  </div>
@endsection