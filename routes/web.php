<?php

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
})->name('landing');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/test', [App\Http\Controllers\CereriController::class, 'index']);
Route::get('/marci', [App\Http\Controllers\CereriController::class, 'marci']);
Route::get('/activitati', [App\Http\Controllers\CereriController::class, 'activitati']);
Route::get('/categorii', [App\Http\Controllers\CereriController::class, 'categorii']);
Route::get('/caen', [App\Http\Controllers\CereriController::class, 'caen']);
Route::post('/cerere', [App\Http\Controllers\CereriController::class, 'store']);
Route::get('/plata', [App\Http\Controllers\PlataController::class, 'index']);
Route::get('/emite', [App\Http\Controllers\PlataController::class, 'emitere']);
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index']);
Route::resource('vehicul', App\Http\Controllers\VehiculController::class);
Route::resource('proprietar', App\Http\Controllers\ProprietarController::class);
Route::resource('conducator', App\Http\Controllers\ConducatorController::class);
Route::post('/ajaxify', [App\Http\Controllers\CereriController::class, 'ajaxify']);
Route::get('/coduri/{judet}/{localitate}', [App\Http\Controllers\CereriController::class, 'getCodes']);
Route::get('/users', [App\Http\Controllers\UsersController::class, 'numara']);
Route::get('/vehicule', [App\Http\Controllers\VehiculController::class, 'numara']);
Route::get('/polite', [App\Http\Controllers\PoliteController::class, 'numara']);
Route::get('/vanzari', [App\Http\Controllers\PoliteController::class, 'vanzari']);
Route::get('/users/all', [App\Http\Controllers\UsersController::class, 'index']);
