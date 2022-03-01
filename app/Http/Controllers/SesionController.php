<?php

namespace App\Http\Controllers;

use App\Models\Sesion;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Activity;
use Illuminate\Support\Facades\Auth;

class SesionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sesions = Sesion::all();

        return view('sesion.index', ['sesions' => $sesions]);
    }

    public function search()
    {
        $user_id = Auth::user()->id;
        return view('sesion.search', ['user_id' => $user_id]);
    }

    public function filter( Request $request ){
        
        
        $name = $request->nombre;
        $date = $request->fecha;

        $activities = Activity::where('name', 'LIKE', '%'. $name .'%')->with("sesions")->get();

        return $activities;
    }

    public function sign( Request $request ){
        
        
        $name = $request->nombre;
        $date = $request->fecha;


        $activities = Activity::where('name', 'LIKE', '%'. $name .'%')->with("sesions")->get();

        return $activities;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sesion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sesion = Sesion::create($request->all());
        return redirect('/sesions');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sesion  $sesion
     * @return \Illuminate\Http\Response
     */
    public function show(Sesion $sesion)
    {
        return view('sesion.show', ['sesion' => $sesion]);
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
    public function destroy(Sesion $sesion)
    {
        // $sesion = Sesion::find($id);
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
