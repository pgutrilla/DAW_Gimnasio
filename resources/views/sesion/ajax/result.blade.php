<table class="table table-striped">
    <tr>
        <th>Actividad</th>
        <th>Fecha Inicio</th>
        <th>Fecha Fin</th>
        <th>Accion</th>
    </tr>
    @forelse ($activities as $activity)
        @foreach ($activity->sesions as $sesion)
        <tr>
            <td>{{$sesion->activity->name}} </td>
            <td>{{$sesion->date_start}} </td>
            <td>{{$sesion->date_end}} </td>
            @if(!$sesion->hasUser($user))         
                <td> <a data-sesion_id={{$sesion->id}} class="btn btn-primary btn-sm alta-user" href="">Apuntarse</a></td>
            @else
                <td> <a data-sesion_id={{$sesion->id}} class="btn btn-danger btn-sm down-user" href="">Despuntarse</a></td>
            @endif
            
        </tr>
        @endforeach
    @empty
    <tr>
        <td colspan="3">No hay actividades registradas</td>
    </tr>
    @endforelse
</table>