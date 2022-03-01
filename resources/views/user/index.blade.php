@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <h1>Lista de usuarios</h1>

      <p>
        El usuario logueado {{ $userl->name }}
      </p>

      <table class="table table-striped">
        <tr>
          <th>Nombre</th>
          <th>Email</th>
          <th>Tipo</th>
        </tr>        
        @foreach ($users as $user)
          <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email}} </td>
            <td>{{ $user->role }}</td>
          </tr>
        @endforeach
      </table>
    </div>
  </div>
</div>
@endsection
