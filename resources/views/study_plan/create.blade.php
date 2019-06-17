@extends('layouts.master')

@section('dentro_de_master')
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" --}}
          {{-- integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3>Nuevo plan de estudio</h3>
            </div>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops! </strong> Hay alguno(s) problema(s) con tu(s) entrada(s).<br>
                <ul>
                    @foreach ($errors as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{route('study_plan.store')}}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <strong>Nombre del plan de estudio:</strong>
                    <input type="text" name="study_plan_name" class="form-control" placeholder="study plan name">
                </div>
                <div class="col-md-12">
                    <strong>Carrera: </strong>
                    <select class="form-control" name="id_career">
                        @foreach ($careers as $career)
                            <option value="{{$career->id}}">{{$career->career_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>


            
            <div class="row">
                <div class="col-md-12">
                    <strong>Software: </strong>
                    <select class="form-control" name="softwares[]" multiple>
                        @foreach ($softwares as $software)
                            <option value="{{$software->id}}">{{$software->name_software}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <strong>Actives: </strong>
                    <select class="form-control" name="actives[]" multiple>
                        @foreach ($active_inputs as $actives)
                            <option value="{{$actives->id}}">{{$actives->input_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>




            <div class="row">
                <div class="col-md-12">
                    <strong>Fecha de incio :</strong>
                    <input type="date" name="date_start" class="form-control" required="required">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <strong>Fecha de termino :</strong>
                    <input type="date" name="date_end" class="form-control" required="required">
                </div>
            </div>


            <div class="col-md-12">
                <a href="{{route('study_plan.index')}}" class="btn btn-sm btn-success">Atras</a>
                <button type="submit" class="btn btn-sm btn-primary">Guardar</button>
            </div>
    </div>
    </form>

    </div>
@endsection