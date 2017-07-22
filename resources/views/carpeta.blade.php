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
                   <li><a href="{{ url('/show/syllabus.pdf')}}">Syllabus: </a> 
                   {!!$carpeta[0]->syllabus!!} 
                   <input type="file" name="file" placeholder=""> </li>
                   <input type="submit" value="Subir">
                </form><br>

                <form method="post" action="/file/acta" enctype="multipart/form-data">
                {{csrf_field()}}
                  <li><a href="{{ url('/show/acta.pdf')}}">Acta: </a>
                  {!!$carpeta[0]->acta!!}
                  <input type="file" name="file" placeholder="Lista de Clases"></li>
                  <input type="submit" value="Subir">
                </form><br>

                <form method="post" action="/file/planilla" enctype="multipart/form-data">
                {{csrf_field()}}
                  <li> <a href="{{ url('/show/planilla.pdf')}}">Planilla: </a>
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
              
                   <li><a href="#"> Syllabus</a><input type="file" name="Syllabus" placeholder="Syllabus"></li>
                   <li><a href="#"> Lista de Clase</a><input type="file" name="Lista Clases" placeholder="Lista de Clases"></li>
                   <li><a href="#"> Acta </a><input type="file" name="Acta" placeholder="Acta"></li>
            >
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
