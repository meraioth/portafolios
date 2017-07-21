@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Carpeta</div>

                <div class="panel-body">
                <form method="post" action="" enctype="multipart/form-data" >
                {{csrf_field()}}
                   <li><a href="#">Syllabus: </a> {!!$carpeta[0]->syllabus!!} <input type="file" name="Syllabus" placeholder="Syllabus"> </li>
                   <input type="submit" value="Subir">
                </form><br>
                <form method="post" action="" enctype="multipart/form-data">
                {{csrf_field()}}
                  <li><a href="#">Acta: </a>{!!$carpeta[0]->acta!!}<input type="file" name="Lista Clases" placeholder="Lista de Clases"></li>
                  <input type="submit" value="Subir">
                </form><br>
                <form method="post" action="" enctype="multipart/form-data">
                {{csrf_field()}}
                  <li> <a href="#">Planilla: </a> {!!$carpeta[0]->planilla!!}<input type="file" name="Acta" placeholder="Acta"></li>
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
                   <li><a href="#"> ph</a></li>
                   
                   <br>
                     <form>
                       <input type="submit" name="Agregar" value="Agregar Evaluacion">
                     </form>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
