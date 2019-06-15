@extends('layouts.app')
@section('content')

  <div class="container">
    <div class="row">
      <div class="col-md-10">
        <h3>Lista de planes de estudio</h3>
      </div>
      <div class="col-sm-2">
        <a class="btn btn-sm btn-success" href="{{ route('study_plan.create')}}">Agregar nuevo plan de estudio</a>
      </div>
    </div>

    @if ($message = Session::get('success'))
      <div class="alert alert-success">
        <p>{{$message}}</p>
      </div>
    @endif

    <table class="table table-hover table-sm">
      <tr>
        <th width = "50px"><b>ID.</b></th>
        <th width = "300px">Nombre</th>
        <th>Carrera</th>
        <th>Fecha de incio</th>
        <th>Fecha de termino</th>
        <th width = "200px">Action</th>
      </tr>
      
      @foreach ($study_plans as $study_plan)
        <tr>
          <td><b>{{$study_plan->id}}.</b></td>
          <td>{{$study_plan->study_plan_name}}</td>
          <td>{{$study_plan->career->career_name}}</td>
          <td>{{$study_plan->date_start}}</td>
          <td>{{$study_plan->date_end}}</td>
          <td>
          <form action="{{route('study_plan.destroy', $study_plan->id)}}" method="post">
            <a class="btn btn-sm btn-success" href="{{route('study_plan.show',$study_plan->id)}}">Detalle</a>
              <a class="btn btn-sm btn-warning" href="{{route('study_plan.edit',$study_plan->id)}}">Editar</a>
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
            </form>
          </td>
        </tr>
      @endforeach
    </table>


  </div>
@endsection