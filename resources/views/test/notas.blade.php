@extends ('template')

@section('title')
    Minhas anotações
@stop

@section ('content')
    <h1>Anotações</h1>
        <ul>
            @foreach ($notas as $nota)
                <li>{{$nota}}</li>
            @endforeach
        </ul>
@stop

<!--
            <li>Anotação 1</li>
            <li>Anotação 2</li>
            <li>Anotação 3...</li>
             
-->
<?php //foreach ($notas as $nota): ?>
        <!-- li><?=$nota; ?></li> -->
<?php // endforeach; ?>  