<?php

namespace App\Http\Controllers;

use App\Models\Sesion;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Activity;
use Illuminate\Support\Facades\Auth;

class SesionController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userl = Auth::user();
        $sesions = Sesion::all();
        

        if($userl->rol == "admin"){
        return view('sesion.index', ['sesions' => $sesions, 'userl' => $userl]);
        } else {
            return redirect('/sesions/search');
        }
    }

    public function search()
    {
        $user_id = Auth::user()->id;
        return view('sesion.search', ['user_id' => $user_id]);
    }

    public function filter( Request $request ){
        
        $name = '';
        $date = '';
        $user_id = '';
        $arrFechaIncio = [];
        
        if($request->nombre != ''){
            $name = $request->nombre;
        }

        if($request->fecha != ''){
            $date = $request->fecha;
        }

        if($request->user_id != ''){
            $user_id = $request->user_id;
        }
        
        if( $date != '' && $name != '' ){

            // $arrFechaIncio = explode('-',$date);

            // $activities = Activity::where('name', 'LIKE', '%'. $name .'%')
            // ->whereIn('id', function($q) use ($date, $arrFechaIncio){
            //     $q->select('activity_id')
            //         ->from('sesions')
            //         ->where('date_start', '>=', $date . ' 00:00:00' )
            //         ->where('date_start', '<=', $date . ' 23:59:59' );
            //         // ->where('date_start', '>=', $arrFechaIncio[0] . '-' . $arrFechaIncio[2] . '-' . $arrFechaIncio[1] . ' 00:00:00' )
            //         // ->where('date_start', '>=', $arrFechaIncio[0] . '-' . $arrFechaIncio[2] . '-' . $arrFechaIncio[1] . ' 23:00:00' );
            // })->with("sesions")->get();

            $activities = Activity::where('name', 'LIKE', '%'. $name .'%')
            ->with(['sesions' => function($query) use ($date) {
                $query->where('date_start', '>=', $date . ' 00:00:00' )
                      ->where('date_start', '<=', $date . ' 23:59:59' );
            }])->get();

        } else if( $name != '' ){

            $activities = Activity::where('name', 'LIKE', '%'. $name .'%')->with("sesions")->get();

        } else if( $date != '' ){

            // $arrFechaIncio = explode('-',$date);
            
            // $activities = Activity::whereIn('id', function($q) use ($date, $arrFechaIncio){
            //     $q->select('activity_id')
            //         ->from('sesions')
            //         ->where('date_start', '>=', $date . ' 00:00:00' )
            //         ->where('date_start', '<=', $date . ' 23:59:59' );
            //         // ->where('date_start', '>=', $arrFechaIncio[0] . '-' . $arrFechaIncio[2] . '-' . $arrFechaIncio[1] . ' 00:00:00' )
            //         // ->where('date_start', '>=', $arrFechaIncio[0] . '-' . $arrFechaIncio[2] . '-' . $arrFechaIncio[1] . ' 23:00:00' );
            // })->with("sesions")->get();

            $activities = Activity::with(['sesions' => function($query) use ($date) {
                $query->where('date_start', '>=', $date . ' 00:00:00' )
                      ->where('date_start', '<=', $date . ' 23:59:59' );
            }])->get();

        }
        
        $user = User::find( $user_id );
        
        // return $activities;
        return view('sesion.ajax.result', ['activities' => $activities, 'user' => $user]);
    }

    public function sign( Request $request ){
        
        $user_id = $request->user_id;
        $sesion_id = $request->sesion_id;
        
        // $user = User::find( Auth::user()->id );
        $user = User::find( $user_id );
        $sesion = Sesion::find($sesion_id);

        $user->addSesion($sesion);

        return response()->json(['status' => 'OK'], 200);
    }

    public function signDown( Request $request ){
        
        $user_id = $request->user_id;
        $sesion_id = $request->sesion_id;
        
        // $user = User::find( Auth::user()->id );
        $user = User::find( $user_id );
        $sesion = Sesion::find($sesion_id);

        $user->removeSesion($sesion);

        return response()->json(['status' => 'OK'], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $activities = Activity::all();

        return view('sesion.create', ['activities' => $activities]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'activity_id' => ['required', 'numeric' ],
            'dias' => ['required'],
            'fecha_inicio' => ['required', 'date' ],
            'fecha_fin' => ['required', 'date' ],
        ]);   

        $activity = Activity::find($request->activity_id);

        $fecha_inicio = $request->fecha_inicio;
        $arrFechaIncio = explode('-',$fecha_inicio);
        $hora_inicio = $request->hora_inicio;
        $arrHoraIncio = explode(':',$hora_inicio);

        $fecha_fin = $request->fecha_fin;
        $arrFechaFin = explode('-',$fecha_fin);
        $hora_fin = $request->hora_fin;
        $arrHoraFin = explode(':',$hora_fin);
        
        $fechaInicio = Carbon::create($arrFechaIncio[0], $arrFechaIncio[1], $arrFechaIncio[2], $arrHoraIncio[0], $arrHoraIncio[1], 0);
        $fechaFin = Carbon::create($arrFechaFin[0], $arrFechaFin[1], $arrFechaFin[2], $arrHoraFin[0], $arrHoraFin[1], 0);

        $arrDias = $request->dias;
        
        $this->fill_month( $activity, $fechaInicio, $fechaFin, $arrDias );
        return redirect('/sesions');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sesion  $sesion
     * @return \Illuminate\Http\Response
     */
    // public function show(Sesion $sesion)
    public function show($id)
    {
        $sesion = Sesion::find($id);
        // dd( $sesion->users );
        return view('sesion.show', ['sesion' => $sesion]);
    }

    public function sesionusers( $id )
    {
        $sesion = Sesion::find($id);

        return view('sesion.usersshow', ['sesion' => $sesion]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sesion  $sesion
     * @return \Illuminate\Http\Response
     */
    public function edit(Sesion $sesion)
    {
        return view('sesion.edit', ['sesion' => $sesion]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sesion  $sesion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sesion $sesion)
    {

        $sesion->fill($request->all());

        $sesion->save();
        return redirect('/sesions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sesion  $sesion
     * @return \Illuminate\Http\Response
     */
    // public function destroy(Sesion $sesion)
    public function destroy($id)
    {
        $sesion = Sesion::find($id);
    
        $sesion->delete();
        return redirect('/sesions');
    }

    public function debug_fill_month(){

        $fechaInicio = Carbon::create(2000, 1, 20, 16, 0, 0);
        $fechaFin = Carbon::create(2000, 1, 20, 20, 0, 0);

        // $arrDias = ['Monday','Friday'];
        $arrDias = ['Monday'];

        // $activity = Activity::find( $id );
        $activity = Activity::find( 2 );

        // echo $fecha->hour;
        // echo $fecha->minute;
        // echo $fecha->second;

        var_dump( $this->fill_month( $activity, $fechaInicio, $fechaFin, $arrDias ) );

    }

    public function fill_month( $activity, $fechaInicio, $fechaFin, $arrDias ){
        
        for($i=1; $i < $fechaInicio->daysInMonth + 1; ++$i) {

            $horaInicio = Carbon::create($fechaInicio->year, $fechaInicio->month, $i, $fechaInicio->hour, $fechaInicio->minute, $fechaInicio->second );
            $horaFin = Carbon::create($fechaFin->year, $fechaFin->month, $i, $fechaFin->hour, $fechaFin->minute, $fechaFin->second );

            if( in_array($horaInicio->englishDayOfWeek, $arrDias) ){

                $sesion = new Sesion;
                $sesion->date_start = $horaInicio->format('Y-m-d h:i:s');
                $sesion->date_end = $horaFin->format('Y-m-d h:i:s');
                $sesion->activity_id = $activity->id;
                $sesion->save();

                // $sesions[] = $sesion;
                // echo $dia->englishDayOfWeek;
            }
            
            // $dates[] = Carbon::createFromDate($fecha->year, $fecha->month, $i, $fecha->hour, $fecha->minute,$fecha->second )->format('Y-m-d h:i:s');
        }

        // return $sesions;

    }


}
