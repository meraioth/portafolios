@extends('layouts.app')

@section('content')

     <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{$evaluacion->nombre}} {{$evaluacion->fecha}}</div>

                <form name="syllabus" method="post" action={{url('/fileEvaluacion/buena')}} enctype="multipart/form-data" >
                {{csrf_field()}}
                   <li><a href="{{ url('/showEvaluacion/'.$evaluacion->nombre.'/buena.pdf')}}">Evaluación Buena: </a> 
                   {!!$evaluacion->buena!!} &nbsp;
                   <input type="file" name="file" placeholder="Buena"> </li>
                   <br> &nbsp;
                   <input type="submit" class="btn btn-primary" value="Subir">
                   <input type="hidden" name="evaluacion_id" value="{!!$evaluacion->id!!}">
                   <input type="hidden" name="nombre" value="{!!$evaluacion->nombre!!}">
                </form><br>

                <form method="post" action={{url('/fileEvaluacion/mala')}} enctype="multipart/form-data">
                {{csrf_field()}}
                  <li><a href="{{ url('/showEvaluacion/'.$evaluacion->nombre.'/mala.pdf')}}">Evaluación Deficiente: </a>
                  {!!$evaluacion->mala!!}
                  &nbsp;
                  <input type="file" name="file" placeholder="Deficiente"></li>
                  <br>&nbsp;
                  <input type="submit" class="btn btn-primary" value="Subir">
                  <input type="hidden" name="evaluacion_id" value="{!!$evaluacion->id!!}">
                   <input type="hidden" name="nombre" value="{!!$evaluacion->nombre!!}">
                </form><br>

                <form method="post" action={{url('/fileEvaluacion/media')}} enctype="multipart/form-data">
                {{csrf_field()}}
                  <li> <a href="{{ url('/showEvaluacion/'.$evaluacion->nombre.'/media.pdf')}}">Evaluación Regular: </a>
                   {!!$evaluacion->media!!}&nbsp;
                   <input type="file" name="file" placeholder="Regular"></li>
                   <br>&nbsp;
                  <input type="submit" class="btn btn-primary" value="Subir">
                  <input type="hidden" name="evaluacion_id" value="{!!$evaluacion->id!!}">
                  <input type="hidden" name="nombre" value="{!!$evaluacion->nombre!!}">
                </form><br>

                <form method="post" action={{url('/fileEvaluacion/pauta')}} enctype="multipart/form-data">
                {{csrf_field()}}
                  <li> <a href="{{ url('/showEvaluacion/'.$evaluacion->nombre.'/pauta.pdf')}}">Pauta: </a>
                   {!!$evaluacion->pauta!!}&nbsp;
                   <input type="file" name="file" placeholder="Pauta"></li>
                   <br>&nbsp;
                  <input type="submit" class="btn btn-primary" value="Subir">
                  <input type="hidden" name="evaluacion_id" value="{!!$evaluacion->id!!}">
                  <input type="hidden" name="nombre" value="{!!$evaluacion->nombre!!}">
                </form><br>  

                <form method="post" action={{url('/fileEvaluacion/otro')}} enctype="multipart/form-data">
                {{csrf_field()}}
                  <li> <a href="{{ url('/showEvaluacion/'.$evaluacion->nombre.'/'.$evaluacion->otro)}}">Otro: </a>
                   {!!$evaluacion->otro!!}&nbsp;
                   <input type="file" name="file" placeholder="Otro"></li>
                   <br>&nbsp;
                  <input type="submit" class="btn btn-primary" value="Subir">
                  <input type="hidden" name="evaluacion_id" value="{!!$evaluacion->id!!}">
                  <input type="hidden" name="nombre" value="{!!$evaluacion->nombre!!}">
                </form><br>           
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
