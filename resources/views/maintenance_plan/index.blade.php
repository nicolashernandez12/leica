@extends('layouts.master')

@section('dentro_de_master')

  <div class="container">
    <div class="row">
      <div class="col-md-10">
        <h3>Lista plan de mantenimiento</h3>
      </div>
      <div class="col-sm-2">
        <a class="btn btn-sm btn-success" href="{{ route('maintenance_plan.create')}}">Agregar plan mantenimiento</a>
      </div>
    </div>

    @if ($message = Session::get('success'))
      <div class="alert alert-success">
        <p>{{$message}}</p>
      </div>
    @endif

    <table class="table table-hover table-sm">
      <tr>
        <th width = "50px"><b>Id.</b></th>
        <th>Nombre</th>
        <th>Prioridad</th>
        <th>Frecuencia</th>
<<<<<<< HEAD
        <th width = "200px">Acción</th>
=======
        <th width = "180px">Acción</th>
>>>>>>> dba0700bca3ff6d2d1dfdb43ce649c2ce065514d
      </tr>
      
      @foreach ($maintenance_plans as $maintenance_plan)
        <tr>
          <td><b>{{$maintenance_plan->id}}.</b></td>
          <td>{{$maintenance_plan->maintenance_plan_name}}</td>
          <td>{{$maintenance_plan->priority->priority_name}}</td>
          <td>{{$maintenance_plan->frequency->frequency_name}}</td>
          <td>
          <form action="{{route('maintenance_plan.destroy', $maintenance_plan->id)}}" method="post">
            <a class="btn btn-sm btn-success" href="{{route('maintenance_plan.show',$maintenance_plan->id)}}">Mostrar</a>
              <a class="btn btn-sm btn-warning" href="{{route('maintenance_plan.edit',$maintenance_plan->id)}}">Editar</a>
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