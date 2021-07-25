@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Asignar un Role</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <h5>Nombre</h5>
            <p class="form-control">{{$user->name}}</p>

            <h5>Lista de roles</h5>
            {!! Form::model($user, ['route' => ['admin.users.update', $user], 'method' => 'put']) !!}
            @foreach ($roles as $role)
            <div>
                <label>
                    {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) !!}
                    {{$role->name}}
                </label>
            </div>
            @endforeach

            {!! Form::submit('Asignar Role', ['class' => 'btn btn-primary mt-2']) !!}
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
