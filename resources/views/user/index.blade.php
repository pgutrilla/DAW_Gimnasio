@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <h1>Lista de usuarios
          <a href="/users/create" class="btn btn-primary float-right">
              Nuevo
          </a>
      </h1>

      <p>
        El usuario logueado {{ $userl->name }}
      </p>

      <table class="table table-striped">
        <tr>
          <th>Nombre</th>
          <th>DNI</th>
          <th>Peso</th>
          <th>Altura</th>
          <th>Email</th>
          <th>Birth</th>
          <th>Género</th>
          <th colspan="3">Acciones</th>
        </tr>        
        @foreach ($users as $user)
          <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->dni}} </td>
            <td>{{ $user->weight }}</td>
            <td>{{ $user->height }}</td>
            <td>{{ $user->email}} </td>
            <td>{{ $user->birth_date}} </td>
            <td>{{ $user->gender }}</td>
            <td style="padding: 0.15rem;"> <a class="btn btn-primary btn-sm" href="/users/{{$user->id}}">Ver</a></td>
            <td style="padding: 0.15rem;"> <a class="btn btn-primary btn-sm" href="/users/{{$user->id}}/edit">Editar</a></td>
            <td style="padding: 0.15rem;"> 
                <form action="/users/{{$user->id}}" method="post">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <input class="btn btn-primary btn-sm" type="submit" value="Borrar">
                </form>                
            </td>
          </tr>
        @endforeach
      </table>
    </div>
  </div>
</div>
@endsection
