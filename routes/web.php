<?php

// use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SesionController;
use App\Http\Controllers\ActivityController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::resource('users', UserController::class);
// Route::get('members', [MemberController::class, 'index']);
// Route::get('members/create', [MemberController::class, 'create']);
// Route::get('members/{id}', [MemberController::class, 'show']);
// Route::post('members', [MemberController::class, 'store']);
// Route::get('members/{id}/edit', [MemberController::class, 'edit']);
// Route::put('members/{id}', [MemberController::class, 'update']);
// Route::delete('members/{id}', [MemberController::class, 'destroy']);

Route::resource('activities', ActivityController::class);

Route::resource('sesions', SesionController::class);
// Route::get('sesions/fill_month', [SesionController::class, 'debug_fill_month']);
Route::get('sesions/search', [SesionController::class, 'search']);
Route::get('sesions/filter', [SesionController::class, 'filter']);
Route::post('sesions/sign', [SesionController::class, 'sign']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('prueba', function(){
})->middleware('role');
