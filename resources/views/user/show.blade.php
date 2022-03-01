<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Miembro nº {{$user}}</h1>

    <ul>
        <li>
            <strong>DNI</strong>
            {{ $user->dni }}
        </li>
        <li>
            <strong>Nombre</strong>
            {{ $user->name }}
        </li>
        <li>
            <strong>Peso</strong>
            {{ $user->weight }}
        </li>
        <li>
            <strong>Altura</strong>
            {{ $user->height }}
        </li>
        <li>
            <strong>Fecha de nacimiento</strong>
            {{ $user->birth_date }}
        </li>
        <li>
            <strong>Género</strong>
            {{ $user->gender }}
        </li>
    </ul>
</body>
</html>