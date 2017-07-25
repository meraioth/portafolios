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
                   <!-- <li><a href="{{ asset('storage/app/'.$directorio.'/syllabus.pdf')}}">Syllabus: </a>  -->
                   {!!$carpeta[0]->syllabus!!} 
                   <input type="file"  name="file" placeholder=""> </li>
                   <br>
                   <input type="submit" class="btn btn-primary" value="Subir">
                </form><br>

                <form method="post" action="/file/acta" enctype="multipart/form-data">
                {{csrf_field()}}
                  <li><a href="{{ url('/show/acta.pdf')}}">Acta: </a>
                  {!!$carpeta[0]->acta!!}
                  <input type="file" name="file" placeholder="Lista de Clases"></li>
                  <br>
                  <input type="submit"  class="btn btn-primary" value="Subir">
                </form><br>

                <form method="post" action="/file/planilla" enctype="multipart/form-data">
                {{csrf_field()}}
                  <li> <a href="{{ url('/show/planilla.pdf')}}">Planilla: </a>
                   {!!$carpeta[0]->planilla!!}
                   <input type="file" name="file" placeholder="Acta"></li>
                   <br>
                  <input type="submit" class="btn btn-primary" value="Subir">
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
                     <div class="text-right"  >
                    <a class="btn btn-primary" method="GET" href="{{ url('/evaluacion/delete/'.$ev->id) }}">x</a>
                    </div>
                    </li>
                    @endforeach
                </div>
                 <div div align="center">
                  <form action="{{url('/'.$carpeta[0]->id.'/evaluacion/create')}}">
                    <button  type="submit" align="right" class="btn  btn-primary">Crear Evaluación</button>
                    </form>
                  </div>
            </div>
        </div>
    </div>
</div>
@endsection
