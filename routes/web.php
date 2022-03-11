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

Route::resource('users', UserController::class)->except(['index','show'])->middleware("role");
Route::get('users', [UserController::class, 'index']);
Route::get('users/{id}', [UserController::class, 'show']);
// Route::get('users/create', [UserController::class, 'create'])->middleware("role");
// Route::post('users', [UserController::class, 'store'])->middleware("role");
// Route::get('users/{id}/edit', [UserController::class, 'edit'])->middleware("role");
// Route::put('users/{id}', [UserController::class, 'update'])->middleware("role");
// Route::delete('users/{id}', [UserController::class, 'destroy'])->middleware("role");

Route::resource('activities', ActivityController::class)->except(['index','show'])->middleware("role");
Route::get('activities', [ActivityController::class, 'index']);
Route::get('activities/{id}', [ActivityController::class, 'show']);
// Route::get('activities/create', [ActivityController::class, 'create'])->middleware("role");
// Route::post('activities', [ActivityController::class, 'store'])->middleware("role");
// Route::get('activities/{id}/edit', [ActivityController::class, 'edit'])->middleware("role");
// Route::put('activities/{id}', [ActivityController::class, 'update'])->middleware("role");
// Route::delete('activities/{id}', [ActivityController::class, 'destroy'])->middleware("role");

Route::get('sesions/fill_month', [SesionController::class, 'debug_fill_month']);
Route::get('sesions/search', [SesionController::class, 'search']);
Route::get('sesions/filter', [SesionController::class, 'filter']);
Route::post('sesions/sign', [SesionController::class, 'sign']);
Route::post('sesions/signdown', [SesionController::class, 'signDown']);
Route::get('sesions/users/{id}', [SesionController::class, 'sesionusers']);

Route::resource('sesions', SesionController::class)->except(['index','show'])->middleware("role");;;
Route::get('sesions', [SesionController::class, 'index']);
Route::get('sesions/{id}', [SesionController::class, 'show']);
// Route::get('sesions/create', [SesionController::class, 'create'])->middleware("role");
// Route::post('sesions', [SesionController::class, 'store'])->middleware("role");
// Route::get('sesions/{id}/edit', [SesionController::class, 'edit'])->middleware("role");
// Route::put('sesions/{id}', [SesionController::class, 'update'])->middleware("role");
// Route::delete('sesions/{id}', [SesionController::class, 'destroy'])->middleware("role");


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('prueba', function(){
})->middleware('role');
