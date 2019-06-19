@extends('layouts.master')

@section('dentro_de_master')
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
<<<<<<< HEAD
        <h3>Editar articulo</h3>
=======
        <h3>Editar activo insumo</h3>
>>>>>>> dba0700bca3ff6d2d1dfdb43ce649c2ce065514d
      </div>
    </div>

    @if ($errors->any())
      <div class="alert alert-danger">
        <strong>Whoops! </strong> Hay algun(os) problema(s) con tu(s) entrada(s).<br>
        <ul>
          @foreach ($errors as $error)
            <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{route('active_input.update',$active_input->id)}}" method="post">
      @csrf
      @method('PUT')
      <div class="row">
        <div class="col-md-12">
          <strong>Nombre :</strong>
          <input type="text" name="input_name" class="form-control" value="{{$active_input->input_name}}">
        </div>

        <div class="col-md-12">
            <strong>Valor UF:</strong>
            <input type="number" name="uf_value" class="form-control" value="{{$active_input->uf_value}}" required="required">
          </div>

        <div class="col-md-12">
          <strong>Caracteristicas :</strong>
          <textarea class="form-control" name="characteristic" rows="4" cols="80">{{$active_input->characteristic}}</textarea>
        </div>
        

        <div class="col-md-12">
<<<<<<< HEAD
            <strong>Observacion :</strong>
            <textarea class="form-control"  name="observation" rows="4" cols="80">{{$active_input->observation}}</textarea>
        </div>

        <div class="col-md-12">
            <strong>Descripcion :</strong>
            <textarea class="form-control"  name="description" rows="4" cols="80">{{$active_input->description}}</textarea>
=======
            <strong>Observación :</strong>
            <textarea class="form-control" value="{{$active_input->observation}}" name="observation" rows="4" cols="80"></textarea>
        </div>

        <div class="col-md-12">
            <strong>Descripción :</strong>
            <textarea class="form-control" value="{{$active_input->description}}" name="description" rows="4" cols="80"></textarea>
>>>>>>> dba0700bca3ff6d2d1dfdb43ce649c2ce065514d
        </div>



        <div class="col-md-12">
            <strong>Modelo: </strong>
            <select class="form-control" name="id_model">
              <option selected value="{{$active_input->model->id}}">{{$active_input->model->model_name}}</option>
                @foreach ($models as $model)
              <option value="{{$model->id}}">{{$model->model_name}}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-12">
            <strong>Plan de mantención: </strong>
            <select class="form-control" name="id_maintenance_plan">
              <option selected value="{{$active_input->maintenancePlan->id}}">{{$active_input->maintenancePlan->maintenance_plan_name}}</option>
                @foreach ($maintenance_plans as $maintenance_plan)
              <option value="{{$maintenance_plan->id}}">{{$maintenance_plan->maintenance_plan_name}}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-12">
          <strong>Categoria: </strong>
          <select class="form-control" name="id_category">
            <option selected value="{{$active_input->category->id}}">{{$active_input->category->category_name}}</option>
              @foreach ($categories as $category)
            <option value="{{$category->id}}">{{$category->category_name}}</option>
              @endforeach
          </select>
      </div>

        <div class="col-md-12">
          <a href="{{route('active_input.index')}}" class="btn btn-sm btn-success">Atrás</a>
          <button type="submit" class="btn btn-sm btn-primary">Guardar</button>
        </div>
      </div>
    </form>
  </div>
@endsection