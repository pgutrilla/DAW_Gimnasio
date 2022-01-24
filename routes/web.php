<?php

use App\Http\Controllers\MemberController;
use App\Http\Controllers\ActivityController;
use Illuminate\Support\Facades\Route;

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

Route::resource('members', MemberController::class);
// Route::get('members', [MemberController::class, 'index']);
// Route::get('members/create', [MemberController::class, 'create']);
// Route::get('members/{id}', [MemberController::class, 'show']);
// Route::post('members', [MemberController::class, 'store']);
// Route::get('members/{id}/edit', [MemberController::class, 'edit']);
// Route::put('members/{id}', [MemberController::class, 'update']);
// Route::delete('members/{id}', [MemberController::class, 'destroy']);

Route::resource('activities', ActivityController::class);
// Route::get('activities', [ActivitieController::class, 'index']);
// Route::get('activities/create', [ActivitieController::class, 'create']);
// Route::get('activities/{id}', [ActivitieController::class, 'show']);
// Route::post('activities', [ActivitieController::class, 'store']);
// Route::get('activities/{id}/edit', [ActivitieController::class, 'edit']);
// Route::put('activities/{id}', [ActivitieController::class, 'update']);
// Route::delete('activities/{id}', [ActivitieController::class, 'destroy']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
