@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <h1>Actualización de estudios</h1>

        <form action="/activities/{{$activity->id}}" method="post">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <div>
            <label for="name">Nombre</label>
            <input type="text" name="name" value="{{$activity->name}}"> 
        </div>

        <div>
            <label for="description">Descripción</label>
            <input type="text" name="description" value="{{$activity->description}}"> 
        </div>

        <div>
            <label for="duration">Duración</label>
            <input type="number" name="duration" value="{{$activity->duration}}"> 
        </div>

        <div>
            <label for="max_participant">Max Participantes</label>
            <input type="number" name="max_participant" value="{{$activity->max_participant}}"> 
        </div>
        
        <div>
            <input type="submit" value="actualizar"> 
        </div>        
        </form>
        </div>
    </div>

</div>
@endsection