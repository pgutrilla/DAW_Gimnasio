@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">


        <h1>Lista de sesiones
            @if($userl->rol == "admin")      
                <a href="/sesions/create" class="btn btn-primary float-right">
                    Alta
                </a>
            @endif    

            <a href="/sesions/search" style="margin-right: 1rem;" class="btn btn-primary float-right">
                Buscar
            </a>
        </h1>


        <table class="table table-striped">
        <tr>
            <th>Actividad</th>
            <th>Fecha Inicio</th>
            <th>Fecha Fin</th>
            <th colspan="3">Acciones</th>
        </tr>
        @forelse ($sesions as $sesion)
        <tr>
            <td>{{$sesion->activity->name}} </td>
            <td>{{$sesion->date_start}} </td>
            <td>{{$sesion->date_end}} </td>
            <td style="padding: 0.15rem;"> <a class="btn btn-primary btn-sm" href="/sesions/{{$sesion->id}}">Ver</a></td>
            @if($userl->rol == "admin")
                <!-- <td style="padding: 0.15rem;"> <a class="btn btn-primary btn-sm" href="/sesions/{{$sesion->id}}/edit">Editar</a></td> -->
                <td style="padding: 0.15rem;"> 
                    <form action="/sesions/{{$sesion->id}}" method="post">
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




