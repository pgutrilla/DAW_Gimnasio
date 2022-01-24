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
@forelse ($activities as $activity)
<tr>
    <td>{{ $activity->name }}</td>
    <td>{{ $activity->days }}</td>
    <td>{{ $activity->n_sessions }}</td>
    <td>{{ $activity->schedule }}</td>
    <td>{{ $activity->duration }}</td>
    <td>{{ $activity->max_participant }}</td>
    <td> <a href="/activities/{{$activity->id}}">Ver</a></td>
</tr>
@empty
<tr>
    <td colspan="3">No hay actividades registrados</td>
</tr>
@endforelse
</table>

</body>
</html>