@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Creación de Ramo </div>

                <div class="panel-body">
                <form form method="POST" action="{{url('/ramo/store')}}">
                    Asignatura
                    <br>
                   <select name="asignatura_codigo">
                   @foreach($asignaturas as $asignatura)
                    <option value="{!!$asignatura->codigo!!}">{!!$asignatura->nombre!!}</option>
                    @endforeach
                </select>
                <br>
                Año<br>
                    <input type="text" name="ano" placeholder="YYYY" required="">
                    <br>
                   Semestre
                   <br>
                    <select name="semestre">
                      <option value="1">1</option>
                      <option value="2">2</option>
                    </select>

                   <input type="hidden" name="_token" value="{{ csrf_token() }}">
                   <br>
                   <div align="center">
                   <button  type="submit" class="btn btn-primary">Crear</button>
                   </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
