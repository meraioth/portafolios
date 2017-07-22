@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Carpeta</div>

                <div class="panel-body">

                <form name="syllabus" method="post" action="/file/syllabus" enctype="multipart/form-data" >
                {{csrf_field()}}
                   <li><a href="{{ asset('storage/app/'.$directorio.'/syllabus.pdf')}}">Syllabus: </a> 
                   {!!$carpeta[0]->syllabus!!} 
                   <input type="file" name="file" placeholder=""> </li>
                   <input type="submit" value="Subir">
                </form><br>

                <form method="post" action="/file/acta" enctype="multipart/form-data">
                {{csrf_field()}}
                  <li><a href="#">Acta: </a>
                  {!!$carpeta[0]->acta!!}
                  <input type="file" name="file" placeholder="Lista de Clases"></li>
                  <input type="submit" value="Subir">
                </form><br>

                <form method="post" action="/file/planilla" enctype="multipart/form-data">
                {{csrf_field()}}
                  <li> <a href="#">Planilla: </a>
                   {!!$carpeta[0]->planilla!!}
                   <input type="file" name="file" placeholder="Acta"></li>
                  <input type="submit" value="Subir">
                </form><br>
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
