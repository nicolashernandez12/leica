@extends('layouts.master')

@section('dentro_de_master')
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3>Agregar activo inzumo</h3>
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

    <form action="{{route('active_input.store')}}" method="post">
      @csrf
      <div class="row">

        <div class="col-md-12">
          <strong>Nombre:</strong>
          <input type="text" name="input_name" class="form-control" placeholder="active_input name" required="required">
        </div>

        <div class="col-md-12">
            <strong>Valor UF:</strong>
            <input type="number" name="uf_value" class="form-control" placeholder="UF Value" required="required">
          </div>

        <div class="col-md-12">
          <strong>Caracteristicas :</strong>
          <textarea class="form-control" placeholder="characteristic" name="characteristic" rows="4" cols="80"></textarea>
        </div>

        <div class="col-md-12">
            <strong>Observacion :</strong>
            <textarea class="form-control" placeholder="observation" name="observation" rows="4" cols="80"></textarea>
        </div>

        <div class="col-md-12">
            <strong>Descripcion :</strong>
            <textarea class="form-control" placeholder="description" name="description" rows="4" cols="80"></textarea>
        </div>

        <div class="col-md-10">
            <strong>Modelo: </strong>
            <select class="form-control" name="id_model">
              @foreach ($models as $model)
              <option value="{{$model->id}}">{{$model->model_name}}</option>
              @endforeach
            </select>
        </div>

        <div class="col-md-2">
          <br>
            <a href="{{route('model.create')}}" class="btn btn-sm btn-success form-control">Agregar modelo</a>
        </div>

        <div class="col-md-10">
            <strong>Plan de mantencion: </strong>
            <select class="form-control" name="id_maintenance_plan">
              @foreach ($maintenance_plans as $maintenance_plan)
              <option value="{{$maintenance_plan->id}}">{{$maintenance_plan->maintenance_plan_name}}</option>
              @endforeach
            </select>
        </div>

        <div class="col-md-2">
          <br>
            <a href="{{route('maintenance_plan.create')}}" class="btn btn-sm btn-success form-control">Agregar plan de mantencion</a>
        </div>

        <div class="col-md-10">
          <strong>Categoria: </strong>
          <select class="form-control" name="id_category">
            @foreach ($categories as $category)
            <option value="{{$category->id}}">{{$category->category_name}}</option>
            @endforeach
          </select>
      </div>

      <div class="col-md-2">
        <br>
          <a href="{{route('category.create')}}" class="btn btn-sm btn-success form-control">Agregar categoria</a>
      </div>

        <div class="col-md-12">
          <a href="{{route('active_input.index')}}" class="btn btn-sm btn-success">Atras</a>
          <button type="submit" class="btn btn-sm btn-primary">Guardar</button>
        </div>
      </div>
    </form>

  </div>
@endsection