@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <h1>Creación de estudios</h1>

        <form action="/sesions" method="post">
        @csrf
        <div>
            <label for="activities">Elige una actividad</label>
            <select name="activity_id" id="activity_id">
                @foreach($activities as $activity)
                <option value="{{$activity->id}}" >{{$activity->name}}</option>
                @endforeach
            </select>
            @error('activity')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label>
                <input type="checkbox" name="dias[]" id="dias[]" value="Monday"> 
                Lunes
            </label>
            <label>
                <input type="checkbox" name="dias[]" id="dias[]" value="Tuesday"> 
                Martes
            </label>
            <label>
                <input type="checkbox" name="dias[]" id="dias[]" value="Wednesday"> 
                Miercoles
            </label>
            <label>
                <input type="checkbox" name="dias[]" id="dias[]" value="Thursday"> 
                Jueves
            </label>
            <label>
                <input type="checkbox" name="dias[]" id="dias[]" value="Friday"> 
                Viernes
            </label>
            <label>
                <input type="checkbox" name="dias[]" id="dias[]" value="Saturday"> 
                Sabado
            </label>
            <label>
                <input type="checkbox" name="dias[]" id="dias[]" value="Sunday"> 
                Domingo
            </label>

            @error('dias')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="fecha_inicio">Fecha de inicio</label>
            <input type="date" name="fecha_inicio" value="{{ old('fecha') }}"> 
            @error('fecha')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="hora_inicio">Hora de inicio</label>
            <input type="time" name="hora_inicio" value="{{ old('hora') }}"> 
            @error('hora')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="fecha_fin">Fecha de fin</label>
            <input type="date" name="fecha_fin" value="{{ old('fecha') }}"> 
            @error('fecha')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="hora_fin">Hora de fin</label>
            <input type="time" name="hora_fin" value="{{ old('hora') }}"> 
            @error('hora')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <input type="submit" value="crear"> 
        </div>        
        </form>
        </div>
    </div>

</div>
@endsection