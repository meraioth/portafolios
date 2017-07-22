@extends('layouts.app')

@section('content')

     <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Mis Evaluaciones</div>

                <form method="POST" action="/storage" accept-charset="UTF-8" enctype="multipart/form-data">
           

                <div class="panel-body">
                @if ($evaluacion->buena!="")  <li><a href="{{ $evaluacion->id }}"> {!!$evaluacion->buena!!}</a><input type="file" name="Syllabus" placeholder="Syllabus" value="Reemplazr archivo"></li>
                
                @else <li><a href="{{ $evaluacion->id }}"> No hay evaluación buena</a><input type="file" name="Syllabus" placeholder="Syllabus"></li>
                 @endif
                

                @if ($evaluacion->mala!="")  <li><a href="{{ $evaluacion->id }}"> {!!$evaluacion->mala!!}</a><input type="file" name="Syllabus" placeholder="Syllabus"></li> 
                 @else <li><a href="{{ $evaluacion->id }}"> No hay evaluación mala</a><input type="file" name="Syllabus" placeholder="Syllabus"></li>
                 @endif

                @if ($evaluacion->media!="")  <li><a href="{{ $evaluacion->id }}"> {!!$evaluacion->media!!}</a><input type="file" name="Syllabus" placeholder="Syllabus"></li> 
                 @else <li><a href="{{ $evaluacion->id }}"> No hay evaluación media</a><input type="file" name="Syllabus" placeholder="Syllabus"></li>
                 @endif


                  </form>

             


         
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
