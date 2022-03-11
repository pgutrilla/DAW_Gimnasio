@extends('layouts.app')

@section('content')


    @forelse ( $sesion->users as $user )
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
    @empty
        <tr>
            <td colspan="3">No hay actividades registradas</td>
        </tr>
    @endforelse
@endsection
</div>