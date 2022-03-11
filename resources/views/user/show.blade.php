@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1>Miembro nº {{$user->id}}</h1>

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

    <table class="table table-striped text-center">
        <tr>
            <th>Nombre</th>
            <th>Fecha Inicio</th>
            <th>Fecha Fin</th>
        </tr>
        @forelse ($user->sesions as $sesion)
        <tr>
            <td>{{$sesion->activity->name}} </td>
            <td>{{$sesion->date_start}} </td>
            <td>{{$sesion->date_end}} </td>
        </tr>

        @empty
        <tr>
            <td colspan="3">No hay actividades registradas</td>
        </tr>
        @endforelse
    </table>
    @endsection
</div>