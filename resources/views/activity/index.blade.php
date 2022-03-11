@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">


        <h1>Lista de actividades
            
            @if($userl->rol == "admin")      
                <a href="/activities/create" class="btn btn-primary float-right">
                    Nuevo
                </a>
            @endif   
        </h1>


        <table class="table table-striped">
        <tr>
            <th>Nombre</th>
            <th>Descripion</th>
            <th>Duracion</th>
            <th>Participantes</th>
            <th colspan="3">Acciones</th>
        </tr>
        @forelse ($activities as $activity)
        <tr>
            <td>{{$activity->name}} </td>
            <td>{{$activity->description}} </td>
            <td>{{$activity->duration}} </td>
            <td>{{$activity->max_participant}} </td>
            <td style="padding: 0.15rem;"> <a class="btn btn-primary btn-sm" href="/activities/{{$activity->id}}">Ver</a></td>
            @if($userl->rol == "admin")
                <td style="padding: 0.15rem;"> <a class="btn btn-primary btn-sm" href="/activities/{{$activity->id}}/edit">Editar</a></td>
                <td style="padding: 0.15rem;"> 
                    <form action="/activities/{{$activity->id}}" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <input class="btn btn-primary btn-sm" type="submit" value="Borrar">
                    </form>                
                </td>
            @endif
        </tr>
        @empty
        <tr>
            <td colspan="3">No hay actividades registradas</td>
        </tr>
        @endforelse
        </table>


        
    </div>
</div>

@endsection




