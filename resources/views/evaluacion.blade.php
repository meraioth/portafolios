@extends('layouts.app')

@section('content')

     <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{$evaluacion->nombre}} {{$evaluacion->fecha}}</div>

                <form name="syllabus" method="post" action="/fileEvaluacion/buena" enctype="multipart/form-data" >
                {{csrf_field()}}
                   <li><a href="{{ asset('storage/app/'.$directorio.'/syllabus.pdf')}}">Buena: </a> 
                   {!!$evaluacion->buena!!} &nbsp;
                   <input type="file" name="file" placeholder="Buena"> </li>
                   <br> &nbsp;
                   <input type="submit" class="btn btn-primary" value="Subir">
                   <input type="hidden" name="evaluacion_id" value="{!!$evaluacion->id!!}">
                   <input type="hidden" name="nombre" value="{!!$evaluacion->nombre!!}">
                </form><br>

                <form method="post" action="/fileEvaluacion/mala" enctype="multipart/form-data">
                {{csrf_field()}}
                  <li><a href="#">Mala: </a>
                  {!!$evaluacion->mala!!}
                  &nbsp;
                  <input type="file" name="file" placeholder="Mala"></li>
                  <br>&nbsp;
                  <input type="submit" class="btn btn-primary" value="Subir">
                </form><br>

                <form method="post" action="/fileEvaluacion/media" enctype="multipart/form-data">
                {{csrf_field()}}
                  <li> <a href="#">Media: </a>
                   {!!$evaluacion->media!!}&nbsp;
                   <input type="file" name="file" placeholder="Media"></li>
                   <br>&nbsp;
                  <input type="submit" class="btn btn-primary" value="Subir">
                </form><br>

                   <form method="post" action="/fileEvaluacion/media" enctype="multipart/form-data">
                {{csrf_field()}}
                  <li> <a href="#">Pauta: </a>
                   {!!$evaluacion->pauta!!}&nbsp;
                   <input type="file" name="file" placeholder="Pauta"></li>
                   <br>&nbsp;
                  <input type="submit" class="btn btn-primary" value="Subir">
                </form><br>             


                 <form method="post" action="/fileEvaluacion/media" enctype="multipart/form-data">
                {{csrf_field()}}
                  <li> <a href="#">Otro: </a>
                   {!!$evaluacion->otro!!}&nbsp;
                   <input type="file" name="file" placeholder="Otro"></li>
                   <br>&nbsp;
                  <input type="submit" class="btn btn-primary" value="Subir">
                </form><br>             


         
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
