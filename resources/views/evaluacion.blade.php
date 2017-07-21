@extends('layouts.app')

@section('content')

     <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Mis Evaluaciones</div>
                {{$carpeta}}

                <div class="panel-body">
                
                   <li><a href="#"> Buena</a><input type="file" name="Syllabus" placeholder="Syllabus"></li>
                   <li><a href="#"> Mala</a><input type="file" name="Lista Clases" placeholder="Lista de Clases"></li>
                   <li><a href="#"> Normal</a><input type="file" name="Acta" placeholder="Acta"></li>
                  
  


    <div class="panel-heading">Tus Asignaturas</div>

                <div class="panel-body">
                <ul>
                    @foreach($evaluaciones as $ev)
                    <li><a method="GET" href="{{ $ev->id }}">
                    {!!$ev->id!!}
                    </a>
                    </li>
                    @endforeach
                </ul>
                </div>
            </div>




         
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
