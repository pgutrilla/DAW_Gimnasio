<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h1>Lista de estudios</h1>


<table border="1">
<tr>
    <th>DNI</th>
    <th>Nombre</th>
    <th>Peso</th>
    <th>Altura</th>
    <th>Fecha Nacimiento</th>
    <th>Genero</th>
    <th>Ver</th>
</tr>
@forelse ($members as $member)
<tr>
    <td>{{ $member->dni }}</td>
    <td>{{ $member->name }}</td>
    <td>{{ $member->weight }}</td>
    <td>{{ $member->height }}</td>
    <td>{{ $member->birth_date }}</td>
    <td>{{ $member->gender }}</td>
    <td> <a href="/members/{{$member->id}}">Ver</a></td>
</tr>
@empty
<tr>
    <td colspan="3">No hay miembros registrados</td>
</tr>
@endforelse
</table>

</body>
</html>