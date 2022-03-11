@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <h1>Actividad nº {{$activity->id}}</h1>


        <ul>
            <li>
                <strong>Nombre</strong>
                {{ $activity->name }}
            </li>
            <li>
                <strong>Descripción</strong>
                {{ $activity->description }}
            </li>
            <li>
                <strong>Duración</strong>
                {{ $activity->duration }}
            </li>
            <li>
                <strong>Numero maximo de participantes</strong>
                {{ $activity->max_participant }}
            </li>
        </ul>

        <br>

        <h2>Sesiones asociadas</h2>

        <table class="table table-striped text-center">
            <tr>
                <th>Nombre</th>
                <th>Fecha Inicio</th>
                <th>Fecha Fin</th>
                <th>Nº Apuntados</th>
                <th>Consultar apuntados</th>
            </tr>
            @forelse ($activity->sesions as $sesion)
            <tr>
                <td>{{$sesion->activity->name}} </td>
                <td>{{$sesion->date_start}} </td>
                <td>{{$sesion->date_end}} </td>
                <td> {{count($sesion->users)}} / {{ $activity->max_participant }}</td>
                <td style="padding: 0.15rem;"> <a class="btn btn-primary btn-sm" href="/sesions/users/{{$sesion->id}}">Ver</a></td>
            </tr>

            @empty
            <tr>
                <td colspan="3">No hay actividades registradas</td>
            </tr>
            @endforelse
        </table>

    
        @endsection
    </div>
