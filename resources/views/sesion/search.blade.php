@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <hr>
        <h2>Busqueda ajax</h2>
        <form action="" name="busqueda" id="formulario">
            <input type="text" name="nombre">
            <input type="date" name="fecha">
            <input type="hidden" name="user" value="{{ $user_id }}">
            <input value="Buscar" type="submit" id="buscar">
        </form>
        <br>
        <table id="resultado" class="table table-striped">
                
        </table>

        </div>
    </div>
</div>


@endsection





