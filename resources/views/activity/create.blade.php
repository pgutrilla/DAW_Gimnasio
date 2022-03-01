@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <h1>Creación de estudios</h1>

        <form action="/activities" method="post">
        @csrf
        <div>
            <label for="name">Nombre</label>
            <input type="text" name="name"> 
        </div>

        <div>
            <label for="description">Descripción</label>
            <input type="text" name="description"> 
        </div>

        <div>
            <label for="duration">Duración</label>
            <input type="number" name="duration"> 
        </div>

        <div>
            <label for="max_participant">Max Participantes</label>
            <input type="number" name="max_participant"> 
        </div>
    
        <div>
            <input type="submit" value="crear"> 
        </div>        
        </form>
        </div>
    </div>

</div>
@endsection