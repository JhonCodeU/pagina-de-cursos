@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear nueva categoria</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.categories.store', 'method' => 'post']) !!}
                {!! Form::label('name', 'Nombre') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'ingrese el nombre de la categoria ']) !!}

                @error('name')
                    <span class="text-danger">{{$message}}</span>
                @enderror

                {!! Form::submit('Crear Categoria', ['class' => 'btn btn-primary mt-3']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
