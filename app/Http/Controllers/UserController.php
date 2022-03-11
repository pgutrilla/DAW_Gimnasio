<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function __construct() {
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

        if($userl->rol == "admin"){
            $users = User::all();
            return view('user.index', ['users' => $users, 'userl' => $userl]);
        } else {
            // dd("hola");
            return redirect("/users/$userl->id");
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'dni' => $request->dni,
            'height' => $request->height,
            'weight' => $request->weight,
            'birth_date' => $request->birth,
            'gender' => $request->sex,
            'password' => Hash::make($request->password)
        ]);
        // dd($request);
        return redirect('/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show( User $user )
    public function show( $id )
    {
        $user = User::find($id);

        return view('user.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit( User $user )
    public function edit( $id )
    {
        $user = User::find($id);

        return view('user.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'height' => ['required', 'numeric' ],
            'weight' => ['required', 'numeric' ],
            'birth' => ['required', 'date' ],
            'sex' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->dni = $request->dni;
        $user->height = $request->height;
        $user->weight = $request->weight;
        $user->birth_date = $request->birth;
        $user->gender = $request->sex;
        $user->password =  Hash::make($request->password);

        $user->save();
        return redirect('/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/users');
    }
}
