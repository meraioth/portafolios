@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Asignar Ramo a {{$asignado->name}}</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{url('/ramo/store')}}">
                        {{ csrf_field() }}
                        
                        <input type="hidden" name="user_id" value="{{$asignado->id}}">

                        <!-- Asignatura -->
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                            <label for="codigo_asignatura" class="col-md-4 control-label">Asignatura</label>

                            <select name="codigo_asignatura">
                                @foreach($asignaturas as $asignatura)
                                    <option value="{!!$asignatura->codigo!!}">{!!$asignatura->nombre!!}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <!-- Semestre -->
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="Semestre" class="col-md-4 control-label">Semestre</label>
                            <select name="semestre">
                                <option value="1">1</option>
                                <option value="2">2</option>
                            </select>
                        </div>
                        
                        <!-- Año -->
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="ano" class="col-md-4 control-label">Año</label>
                            <select name="ano">
                                <option value="{{date('Y')}}" >{{date('Y')}}</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Agregar Ramo
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
