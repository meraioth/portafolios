@extends('layouts.app')

@section('content')

     <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{$evaluacion->nombre}}</div>

                <form name="syllabus" method="post" action="/fileEvaluacion/buena" enctype="multipart/form-data" >
                {{csrf_field()}}
                   <li><a href="{{ asset('storage/app/'.$directorio.'/syllabus.pdf')}}">Buena: </a> 
                   {!!$evaluacion->buena!!} 
                   <input type="file" name="file" placeholder="Buena"> </li>
                   <input type="submit" value="Subir">
                   <input type="hidden" name="evaluacion_id" value="{!!$evaluacion->id!!}">
                   <input type="hidden" name="nombre" value="{!!$evaluacion->nombre!!}">
                </form><br>

                <form method="post" action="/fileEvaluacion/mala" enctype="multipart/form-data">
                {{csrf_field()}}
                  <li><a href="#">Mala: </a>
                  {!!$evaluacion->mala!!}
                  <input type="file" name="file" placeholder="Mala"></li>
                  <input type="submit" value="Subir">
                </form><br>

                <form method="post" action="/fileEvaluacion/media" enctype="multipart/form-data">
                {{csrf_field()}}
                  <li> <a href="#">Media: </a>
                   {!!$evaluacion->media!!}
                   <input type="file" name="file" placeholder="Media"></li>
                  <input type="submit" value="Subir">
                </form><br>

             


         
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
