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
                   <input type="file" name="file" placeholder=""> </li>
                   <input type="submit" value="Subir">
                </form><br>

                <form method="post" action="/fileEvaluacion/mala" enctype="multipart/form-data">
                {{csrf_field()}}
                  <li><a href="#">Acta: </a>
                  {!!$evaluacion->mala!!}
                  <input type="file" name="file" placeholder="Lista de Clases"></li>
                  <input type="submit" value="Subir">
                </form><br>

                <form method="post" action="/fileEvaluacion/media" enctype="multipart/form-data">
                {{csrf_field()}}
                  <li> <a href="#">Planilla: </a>
                   {!!$evaluacion->media!!}
                   <input type="file" name="file" placeholder="Acta"></li>
                  <input type="submit" value="Subir">
                </form><br>

             


         
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
