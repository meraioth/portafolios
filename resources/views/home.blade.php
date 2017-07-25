@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Tus Asignaturas</div>
                {{csrf_field()}}
                <div class="panel-body">
                <ul>
                    @foreach($Ramos as $us)
                    <li><a method="GET" href="{{ url('/carpeta/'.$us->id) }}">
                    {!!$ramos[$us->id]->nombre.'-'.$us->ano.'-'.$us->semestre!!}
                    </a>
                    <!-- &nbsp; &nbsp;&nbsp; &nbsp;
                    <a class="btn btn-default" method="GET" href="{{ url('/ramo/delete/'.$us->id) }}">X</a> -->
                    </li>
                    @endforeach
                </ul>
                </div>
                <  <div align="center">
                  <form action="{{url('/ramo/create')}}">
                    <button type="submit" align="center" class="btn btn-primary">Crear Ramo</button>
                    </form>
                  </div> 


            </div>
            @if(Auth::user()->email=="gonzalorojas@udec.cl")
                <div class="panel panel-default">
                <div class="panel-heading">Jefatura Carrera</div>
                {{csrf_field()}}
                <div class="panel-body">
                <ul>
                  @foreach($usuarios as $usuario)
                    <li><a method="GET" href="{{ url('/ramo_jc/'.$usuario->id) }}">
                    {!!$usuario->name!!}
                    </a>
                    <!-- &nbsp; &nbsp;&nbsp; &nbsp;
                    <a class="btn btn-default" method="GET" href="{{ url('/ramo/delete/'.$us->id) }}">X</a> -->
                    </li>
                    @endforeach
                </ul>
                </div>
                @endif
                
            </div>
        </div>
    </div>
</div>
@endsection
