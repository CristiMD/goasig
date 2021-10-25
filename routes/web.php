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


//Public routes
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/marci', [App\Http\Controllers\CereriController::class, 'marci']);
Route::get('/activitati', [App\Http\Controllers\CereriController::class, 'activitati']);
Route::get('/categorii', [App\Http\Controllers\CereriController::class, 'categorii']);
Route::get('/caen', [App\Http\Controllers\CereriController::class, 'caen']);
Route::post('/cerere', [App\Http\Controllers\CereriController::class, 'store']);
Route::get('/plata', [App\Http\Controllers\PlataController::class, 'index']);
Route::get('/emite', [App\Http\Controllers\PlataController::class, 'emitere']);
Route::post('/ajaxify', [App\Http\Controllers\CereriController::class, 'ajaxify']);
Route::get('/coduri/{judet}/{localitate}', [App\Http\Controllers\CereriController::class, 'getCodes']);
Route::resource('vehicul', App\Http\Controllers\VehiculController::class);
Route::resource('proprietar', App\Http\Controllers\ProprietarController::class);
Route::resource('conducator', App\Http\Controllers\ConducatorController::class);
Route::get('/test', [App\Http\Controllers\TestController::class, 'ping']);



//Users

Route::group(['middleware' => 'roles:user,admin,partener'], function(){

    Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout']);

   
    Route::get('/users', [App\Http\Controllers\UsersController::class, 'numara']);
    Route::get('/vehicule', [App\Http\Controllers\VehiculController::class, 'numara']);
    Route::get('/polite', [App\Http\Controllers\PoliteController::class, 'numara']);
    Route::get('/vanzari/{perioada?}/{id?}', [App\Http\Controllers\PoliteController::class, 'vanzari']);
    Route::get('/users/all/{perioada?}', [App\Http\Controllers\UsersController::class, 'index']);
    Route::get('/polite/all/{perioada?}', [App\Http\Controllers\PoliteController::class, 'index']);
    Route::delete('/users/{id}', [App\Http\Controllers\UsersController::class, 'delete']);
    Route::get('/users/{id}', [App\Http\Controllers\UsersController::class, 'unic']);
    Route::post('/users', [App\Http\Controllers\UsersController::class, 'editare']);

    Route::get('/test', [App\Http\Controllers\CereriController::class, 'index']);

    Route::get('conducator/{cod}', [App\Http\Controllers\ConducatorController::class, 'info']);
    Route::post('conducator/{cod}', [App\Http\Controllers\ConducatorController::class, 'editare']);


    Route::get('proprietar/{cod}', [App\Http\Controllers\ProprietarController::class, 'info']);
    Route::post('proprietar/{cod}', [App\Http\Controllers\ProprietarController::class, 'editare']);


    Route::get('vehicul/{nr_inmatriculare}', [App\Http\Controllers\VehiculController::class, 'info']);
    Route::post('vehicul/{nr_inmatriculare}', [App\Http\Controllers\VehiculController::class, 'editare']);


    Route::get('/contul-meu/{view?}', [App\Http\Controllers\UsersController::class, 'cont']);
    Route::get('/save-pdf/{id_oferta}',[App\Http\Controllers\PoliteController::class, 'save_pdf']);


    Route::get('/users/date/{perioada}', [App\Http\Controllers\UsersController::class, 'list_perioada']);
    Route::get('/users/all/{perioada}', [App\Http\Controllers\UsersController::class, 'index_perioada']);
    Route::get('/users/cautare/{termeni}', [App\Http\Controllers\UsersController::class, 'index_cautare']);
    Route::get('/polite/date/{perioada?}/{id?}', [App\Http\Controllers\PoliteController::class, 'list_perioada']);
    Route::get('/polite/cautare/{perioada}', [App\Http\Controllers\PoliteController::class, 'index_cautare']);
    Route::get('/vehicule/date/{perioada?}/{id?}', [App\Http\Controllers\VehiculController::class, 'list_perioada']);
    Route::get('/vehicule/all/{perioada?}', [App\Http\Controllers\VehiculController::class, 'index_perioada']);


    Route::get('/oferte/date/{perioada}', [App\Http\Controllers\OfertaController::class, 'list_perioada']);
    Route::get('/oferte/cautare/{perioada}', [App\Http\Controllers\OfertaController::class, 'index_cautare']);
    Route::get('/oferte/all/{perioada?}', [App\Http\Controllers\OfertaController::class, 'index_perioada']);

    Route::get('/parteneri/all/{perioada?}', [App\Http\Controllers\UsersController::class, 'list_parteneri']);
    
    Route::get('/polite/comision/{perioada?}/{id?}', [App\Http\Controllers\PoliteController::class, 'comision_perioada']);



    ///// parteneri

    Route::get('/polite/platite/{perioada?}/{id?}', [App\Http\Controllers\PoliteController::class, 'index_platite']);
    Route::get('/polite/neplatite/{perioada?}/{id?}', [App\Http\Controllers\PoliteController::class, 'index_neplatite']);
    Route::post('/polite/comision/status', [App\Http\Controllers\PoliteController::class, 'status_comision']);
    ////
});

//Admins 
Route::group(['middleware' => 'roles:admin'], function(){
    Route::get('/admin/users', [App\Http\Controllers\UsersController::class, 'admin_users']);
    Route::post('/admin/users', [App\Http\Controllers\UsersController::class, 'create']);
    Route::post('/admin/users/{id}', [App\Http\Controllers\UsersController::class, 'edit']);
    Route::post('/create-acc', [App\Http\Controllers\CereriController::class, 'create_acc']);
    Route::get('/admin/parteneri', [App\Http\Controllers\UsersController::class, 'admin_parteneri']);

});

//Parteneri
Route::group(['middleware' => 'roles:admin,partener'], function(){
    Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index']);
    Route::get('/admin/polite', [App\Http\Controllers\PoliteController::class, 'admin_polite']);
    Route::get('/admin/oferte', [App\Http\Controllers\OfertaController::class, 'admin_oferte']);
});
