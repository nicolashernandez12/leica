{{-- @extends('layouts.app')
@section('content') --}}
@extends('layouts.master')

@section('dentro_de_master')
    

  <div class="container">
    <div class="row">
      <div class="col-md-10">
        <h3>Lista de categoria</h3>
      </div>
      <div class="col-sm-2">
        <a class="btn btn-sm btn-success" href="{{ route('category.create')}}">Agregar categoria</a>
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
        <th >Descripcion</th>
        <th width = "210px">Accion</th>
      </tr>

      @foreach ($categories as $category)
        <tr>
          <td><b>{{$category->id}}.</b></td>
          <td>{{$category->category_name}}</td>
          <td>{{$category->description}}</td>
          <td>
          <form action="{{route('category.destroy', $category->id)}}" method="post">
            <a class="btn btn-sm btn-success" href="{{route('category.show',$category->id)}}">Mostrar</a>
            <a class="btn btn-sm btn-warning" href="{{route('category.edit',$category->id)}}">Editar</a>
              @csrf
              @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
            </form>
          </td>
        </tr>
      @endforeach
    </table>

{!! $categorys->links() !!}
  </div>
@endsection