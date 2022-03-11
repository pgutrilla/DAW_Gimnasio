@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1>Sesion nº {{$sesion->id}}</h1>

    <ul>
        <li>
            <strong>Actividad</strong>
            {{ $sesion->activity->name }}
        </li>
        <li>
            <strong>Fecha Inicio</strong>
            {{ $sesion->date_start }}
        </li>
        <li>
            <strong>Fecha Fin</strong>
            {{ $sesion->date_end }}
        </li>

    </ul>
    @endsection
</div>