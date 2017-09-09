@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Asignaturas</div>
                {{csrf_field()}}
                <div class="panel-body">
                    <ul>
                        @foreach($Ramos as $us)
                        <li><a method="GET" href="{{ url('/ramo_jc/'.$user.'/'.$us->id) }}">
                        {!!$ramos[$us->id]->nombre.'-'.$us->ano.'-'.$us->semestre!!}
                        </a>
                        <!-- &nbsp; &nbsp;&nbsp; &nbsp;
                        <a class="btn btn-default" method="GET" href="{{ url('/ramo/delete/'.$us->id) }}">X</a> -->
                        </li>
                        @endforeach
                    </ul>
                    <form action="/asignatura/create">
                            <button  type="submit" align="right" class="btn  btn-primary">Agregar Ramo</button>
                    </form>
                </div>
                @if(Session::get('nofile')==true)
                    <div>No se han añadido archivos a este ramo</div>
                @endif
                
            </div>
        </div>
    </div>
</div>
@endsection
