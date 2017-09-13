@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @foreach($fechas as $fecha)
                <div class="panel panel-default">
                    @for($i =2 ; $i > 0 ; $i--)
                    <div class="panel-heading">Asignaturas {{$fecha}} - {{$i}}° Semestre:</div>
                    {{csrf_field()}}
                    <div class="panel-body">
                        <ul>
                            <?php  $exists = false; ?>
                            @foreach($Ramos as $us)
                                @if($us->ano == $fecha && $us->semestre == $i)
                                <?php  $exists = true; ?>
                                <li><a method="GET" href="{{ url('/carpeta/'.$us->id) }}">
                                {!!$ramos[$us->id]->nombre!!}
                                </a>
                                </li>
                                @endif
                            @endforeach
                        <?php  
                            if($exists == false){
                                echo "<li>Ningun ramo disponible</li>";
                            } 
                        ?>
                        </ul>
                    </div>
                    @endfor
                    <div align="center">
                        <form action="{{url('/ramo/create')}}">
                        </form>
                    </div>
                </div>
            @endforeach
            
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
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">Catalogo Asignaturas</div>
                    {{csrf_field()}}
                    <div class="panel-body">
                        <ul>
                            @foreach($asignaturas as $asignatura)
                                <li>
                                {!!$asignatura->codigo!!} - {{$asignatura->nombre}}
                                </li>
                            @endforeach
                        </ul>
                        <form action="/asignaturas/create">
                        <button  type="submit" align="right" class="btn  btn-primary">Agregar Asignatura</button>
                        </form>
                  </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
