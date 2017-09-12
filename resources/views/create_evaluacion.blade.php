@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Creación de Evaluación</div>

                <div class="panel-body">
                <form method="POST" action="{{url('/evaluacion/store')}}">
                <input class="form-control" type="text" name="nombre" placeholder="Nombre Evaluacion">
                <br>
                <!-- <input class="form-control" type="text" name="fecha" placeholder="Fecha"> -->
                <input class="form-control" type="date" name="fecha">
                <br>
                <select class="form-control" name="tipo">
                    <option value="Certamen">Certamen</option>
                    <option value="Test">Test</option>
                    <option value="Quiz">Quiz</option>
                    <option value="Laboratorio">Laboratorio</option>
                    <option value="Tarea">Tarea</option>
                    <option value="Trabajo">Trabajo</option>
                    <option value="Otro">Otro</option>
                </select>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <input type="hidden" name="carpeta_id" value="{!!$carpeta_id!!}">
                <br>
                <button type="submit" class="btn btn-primary">Crear</button>
               </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
