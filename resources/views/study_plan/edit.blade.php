@extends('layouts.master')

@section('dentro_de_master')

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3>Editar Plan de estudio</h3>
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

        <form action="{{route('study_plan.update',$study_plan->id)}}" method="post">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-12">
                    <strong>Nombre del plan de estudio:</strong>
                    <input type="text" name="study_plan_name" class="form-control"
                           value="{{$study_plan->study_plan_name}}">
                </div>
                <div class="col-md-12">
                    <strong>Carrera: </strong>
                    <select class="form-control" name="id_career">
                        <option selected
                                value="{{$study_plan->career->id}}">{{$study_plan->career->career_name}}</option>
                        @foreach ($careers as $career)
                            <option value="{{$career->id}}">{{$career->career_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>



            {{-- <div class="row">
                <div class="col-md-12">
                    <strong>Actives: </strong>
                    <select class="form-control" name="actives[]" multiple>
                        @foreach ($actives as $active)
                            @if(in_array($active->id, $actives_ids))
                                <option selected value="{{$active->id}}">{{$active->input_name}}</option>
                            @else
                                <option value="{{$active->id}}">{{$active->input_name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div> --}}

            <div class="row">
                <div class="col-md-12">
                    <strong>Software: </strong>
                    <select class="form-control" name="softwares[]" multiple>
                        @foreach ($softwares as $software)
                            @if(in_array($software->id, $software_ids))
                                <option selected value="{{$software->id}}">{{$software->name_software}}</option>
                            @else
                                <option value="{{$software->id}}">{{$software->name_software}}</option>
                            @endif

                        @endforeach
                    </select>
                </div>
            </div>




            <div class="row">
                <div class="col-md-12">
                    <strong>Fecha de inicio :</strong>
                    <input type="date" name="date_start" class="form-control" value="{{$study_plan->date_start}}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <strong>Fecha de termino :</strong>
                    <input type="date" name="date_end" class="form-control" value="{{$study_plan->date_end}}">
                </div>
            </div>

            <div class="col-md-12">
                <a href="{{route('study_plan.index')}}" class="btn btn-sm btn-success">Atras</a>
                <button type="submit" class="btn btn-sm btn-primary">Guardar</button>
            </div>
        </form>
    </div>

@endsection