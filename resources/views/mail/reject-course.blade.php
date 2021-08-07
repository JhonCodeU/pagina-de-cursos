<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        h1{
            color: red;
        }
    </style>
</head>
<body>
    <h1>Este es un correo electrónico de prueba</h1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae delectus nam, et autem odio consequuntur quidem magni quos, eos repellat quo nisi cumque unde earum. Quaerat adipisci deserunt optio harum.</p>
    <p>El curso <strong>{{$course->title}}</strong> se ha aprobado con exito</p>
    <h2>Motivo del rechazo</h2>
    {!! $course->observation->body !!}
</body>
</html>