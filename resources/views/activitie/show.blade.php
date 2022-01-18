<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Miembro nº {{$activitie}}</h1>
    
    <ul>
        <li>
            <strong>Nombre</strong>
            {{ $activitie->name }}
        </li>
        <li>
            <strong>Dias</strong>
            {{ $activitie->days }}
        </li>
        <li>
            <strong>Nº Sesiones</strong>
            {{ $activitie->n_sessions }}
        </li>
        <li>
            <strong>Horario</strong>
            {{ $activitie->schedule }}
        </li>
        <li>
            <strong>Duración</strong>
            {{ $activitie->duration }}
        </li>
        <li>
            <strong>Nº Participantes</strong>
            {{ $activitie->max_participant }}
        </li>
    </ul>
</body>
</html>