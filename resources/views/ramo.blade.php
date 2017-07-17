@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Carpeta</div>

                <div class="panel-body">
                <form>
                   <li><a href="#"> Syllabus</a><input type="file" name="Syllabus" placeholder="Syllabus"></li>
                   <li><a href="#"> Lista de Clase</a><input type="file" name="Lista Clases" placeholder="Lista de Clases"></li>
                   <li><a href="#"> Acta </a><input type="file" name="Acta" placeholder="Acta"></li>


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
