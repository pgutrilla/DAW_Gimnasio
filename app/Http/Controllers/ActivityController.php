<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ActivityController extends Controller
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
        $activities = Activity::all();

        return view('activity.index', ['activities' => $activities, 'userl' => $userl]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('activity.create');
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
            'name' => ['required', 'string' ],
            'description' => ['required', 'string' ],
            'duration' => ['required', 'numeric' ],
            'max_participants' => ['required', 'numeric' ],
        ]);   

        $activity = Activity::create($request->all());
        return redirect('/activities');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( $id )
    // public function show( Activity $activity )
    {
        $activity = Activity::find( $id );
        return view('activity.show', ['activity' => $activity]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // public function edit( Activity $activity )
    public function edit( $id )
    {
        $activity = Activity::find($id);

        return view('activity.edit', ['activity' => $activity]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Activity $activity)
    {

        $request->validate([
            'name' => ['required', 'string' ],
            'description' => ['required', 'string' ],
            'duration' => ['required', 'numeric' ],
            'max_participants' => ['required', 'numeric' ],
        ]); 

        $activity->fill($request->all());

        $activity->save();
        return redirect('/activities');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $activities = Activity::find($id);
        $activities->delete();
        return redirect('/activities');
    }
}
