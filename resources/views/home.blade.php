@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Tus Asignaturas</div>

                <div class="panel-body">
                <ul>
                    @foreach($ramos as $us)
                    <li><a method="GET" href="{{ url('/ramo/'.$id[$us->codigo]) }}">
                    {!!$us->nombre!!}
                    </a>
                    </li>
                    @endforeach
                </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
