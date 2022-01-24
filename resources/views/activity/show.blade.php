<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Miembro nº {{$activity}}</h1>
    
    <ul>
        <li>
            <strong>Nombre</strong>
            {{ $activity->name }}
        </li>
        <li>
            <strong>Dias</strong>
            {{ $activity->days }}
        </li>
        <li>
            <strong>Nº Sesiones</strong>
            {{ $activity->n_sessions }}
        </li>
        <li>
            <strong>Horario</strong>
            {{ $activity->schedule }}
        </li>
        <li>
            <strong>Duración</strong>
            {{ $activity->duration }}
        </li>
        <li>
            <strong>Nº Participantes</strong>
            {{ $activity->max_participant }}
        </li>
    </ul>
</body>
</html>