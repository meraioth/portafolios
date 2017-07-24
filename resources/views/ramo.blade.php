@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Carpeta </div>

                <div class="panel-body">
                <form>
                   <li> Syllabus<input type="file" name="Syllabus" placeholder="Syllabus"></li>
                   <li> Lista de Clase<input type="file" name="Lista Clases" placeholder="Lista de Clases"></li>
                   <li> Acta <input type="file" name="Acta" placeholder="Acta"></li>


                </form>
                </div>
            </div>
        </div>
    </div>
     <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Mis Evaluaciones</div>

                <div class="panel-body">
                     @foreach($evaluaciones as $ev)
                    <li><a method="GET" href="{{ url('/evaluaciones/'.$ev->id)}}">
                    {!!$ev->nombre!!}
                    </a>
                    </li>
                    @endforeach
                 <div>
                  <form action="{{url('/'.$carpeta_id.'/evaluacion/create')}}">
                    <button class="btn" type="submit" align="center">Crear Evaluación</button>
                    </form>
                  </div>
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
