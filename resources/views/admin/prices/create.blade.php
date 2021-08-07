@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Nuevo precio</h1>
@stop

@section('content')
        <div class="card">
            <div class="card-body">
                {!! Form::open(['route' => 'admin.prices.store', 'method' => 'post']) !!}

                    <div class="form-group">
                        {!! Form::label('name', 'Nombre') !!}
                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'ingrese el nombre de este precio']) !!}
                    </div>

                    @error('name')
                        <div>
                            <span class="text-danger text-sm">{{$message}}</span>
                        </div>
                    @enderror

                    <div class="form-group">
                        {!! Form::label('value', 'Valor') !!}
                        {!! Form::number('value', null, ['class' => 'form-control', 'placeholder' => 'ingrese el valor del precio']) !!}
                    </div>

                    @error('value')
                        <div>
                            <span class="text-danger text-sm">{{$message}}</span>
                        </div>
                    @enderror

                    {!! Form::submit('Crear nuevo precio', ['class' => 'btn btn-primary']) !!}

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
