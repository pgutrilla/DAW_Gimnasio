<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h1>Lista de activities</h1>


<table border="1">
<tr>
    <th>Nombre</th>
    <th>Dias</th>
    <th>Nº Sesiones</th>
    <th>Horario</th>
    <th>Duración</th>
    <th>Nº Participantes</th>
    <th>Ver</th>
</tr>
@forelse ($activities as $activitie)
<tr>
    <td>{{ $activitie->name }}</td>
    <td>{{ $activitie->days }}</td>
    <td>{{ $activitie->n_sessions }}</td>
    <td>{{ $activitie->schedule }}</td>
    <td>{{ $activitie->duration }}</td>
    <td>{{ $activitie->max_participant }}</td>
    <td> <a href="/activities/{{$activitie->id}}">Ver</a></td>
</tr>
@empty
<tr>
    <td colspan="3">No hay actividades registrados</td>
</tr>
@endforelse
</table>

</body>
</html>