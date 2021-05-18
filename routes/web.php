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

Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout']);
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
Route::get('/polite/all', [App\Http\Controllers\PoliteController::class, 'index']);
Route::delete('/users/{id}', [App\Http\Controllers\UsersController::class, 'delete']);
Route::get('/users/{id}', [App\Http\Controllers\UsersController::class, 'unic']);
Route::post('/users', [App\Http\Controllers\UsersController::class, 'editare']);
Route::get('/admin/users', [App\Http\Controllers\UsersController::class, 'admin_users']);
Route::post('/admin/users', [App\Http\Controllers\UsersController::class, 'create']);
Route::post('/admin/users/{id}', [App\Http\Controllers\UsersController::class, 'edit']);


Route::get('/admin/polite', [App\Http\Controllers\PoliteController::class, 'admin_polite']);


Route::get('conducator/{cod}', [App\Http\Controllers\ConducatorController::class, 'info']);
Route::post('conducator/{cod}', [App\Http\Controllers\ConducatorController::class, 'editare']);


Route::get('proprietar/{cod}', [App\Http\Controllers\ProprietarController::class, 'info']);
Route::post('proprietar/{cod}', [App\Http\Controllers\ProprietarController::class, 'editare']);


Route::get('vehicul/{nr_inmatriculare}', [App\Http\Controllers\VehiculController::class, 'info']);
Route::post('vehicul/{nr_inmatriculare}', [App\Http\Controllers\VehiculController::class, 'editare']);


//Cont
Route::get('/contul-meu/{view?}', [App\Http\Controllers\UsersController::class, 'cont']);

Route::get('/save-pdf/{id_oferta}',[App\Http\Controllers\PoliteController::class, 'save_pdf']);

Route::get('/foo', function () {
    Artisan::call('storage:link');
});