@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Asignaturas de {{$user->name}}</div>
                {{csrf_field()}}
                <div class="panel-body">
                    <ul>
                        @foreach($Ramos as $ramo)
                        <li><a method="GET" href="{{ url('/ramo_jc/'.$user->id.'/'.$ramo->id) }}">
                        {!!$ramos[$ramo->id]->nombre.'-'.$ramo->ano.'-'.$ramo->semestre!!}
                        </a>
                        </li>
                        @endforeach
                    </ul>
                    <form action="/ramo/create/{{$user->id}}">
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
