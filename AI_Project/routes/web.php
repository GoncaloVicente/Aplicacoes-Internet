<?php

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

Route::middleware(['auth', 'verified','ativo'])->group(
    function () {

//Aerodromo
Route::get('/aerodromos', 'AerodromosController@index')->name('aerodromos.index');
Route::get('/aerodromos/{aerodromo}/edit', 'AerodromosController@edit')->name('aerodromos.edit');
Route::put('/aerodromos/{aerodromo}', 'AerodromosController@update')->name('aerodromos.update');

//Aeronaves
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/aeronaves', 'AeronaveController@index')->name('aeronaves.index');
Route::get('/aeronaves/create', 'AeronaveController@create')->name('aeronaves.create');
Route::post('/aeronaves', 'AeronaveController@store')->name('aeronaves.store');
Route::get('/aeronaves/{aeronave}/edit', 'AeronaveController@edit')->name('aeronaves.edit');
Route::put('/aeronaves/{aeronave}', 'AeronaveController@update')->name('aeronaves.update');
Route::delete('/aeronaves/{aeronave}', 'AeronaveController@destroy')->name('aeronaves.destroy');
Route::get('/aeronaves/{aeronave}/pilotos', 'AeronaveController@pilotosAutorizados')->name('aeronaves.pilotosAutorizados');
Route::delete('/aeronaves/{aeronave}/pilotos/{piloto}', 'AeronaveController@naoAutorizarPiloto')->name('aeronaves.naoAutorizarPiloto');
Route::get('/aeronaves/{aeronave}/pilotosNaoAutorizados', 'AeronaveController@pilotosNaoAutorizados')->name('aeronaves.pilotosNaoAutorizados');
Route::post('/aeronaves/{aeronave}/pilotos/{piloto}', 'AeronaveController@autorizarPiloto')->name('aeronaves.autorizarPiloto');
Route::get('/aeronaves/{aeronave}/precos_tempos', 'AeronaveController@mostrarPrecos')->name('aeronaves.precos');

//Socios
Route::get('/socios', 'UtilizadorController@index')->name('socios.index');
Route::get('/socios/create', 'UtilizadorController@create')->name('socios.create');
Route::post('/socios', 'UtilizadorController@store')->name('socios.store');
Route::post('/socios/{socio}/send_reactivate_mail', 'UtilizadorController@reenviarEmail')->name('socios.reenviarEmail');
Route::get('/socios/{socio}/edit', 'UtilizadorController@edit')->name('socios.edit');
Route::put('/socios/{socio}', 'UtilizadorController@update')->name('socios.update');
Route::delete('/socios/{socio}', 'UtilizadorController@destroy')->name('socios.destroy');
Route::patch ('/socios/reset_quotas', 'UtilizadorController@reset_quotas')->name('socios.reset_quotas');
Route::patch ('/socios/{socio}/quota', 'UtilizadorController@quotas')->name('socios.quotas');
Route::patch ('/socios/{socio}/ativo', 'UtilizadorController@ativo')->name('socios.ativo');
Route::patch ('/socios/desativar_sem_quotas', 'UtilizadorController@desativar_sem_quotas')->name('socios.desativar_sem_quotas');
Route::get('/pilotos/{piloto}/certificado', 'UtilizadorController@certificado')->name('socios.certificado');
Route::get('/pilotos/{piloto}/licenca', 'UtilizadorController@licenca')->name('socios.licenca');

//Movimentos
Route::get('/movimentos', 'MovimentoController@index')->name('movimentos.index');
Route::get('/movimentos/create', 'MovimentoController@create')->name('movimentos.create');
Route::post('/movimentos', 'MovimentoController@store')->name('movimentos.store');
Route::delete('/movimentos/{movimento}', 'MovimentoController@destroy')->name('movimentos.destroy');
Route::get('/movimentos/{movimento}/edit', 'MovimentoController@edit')->name('movimentos.edit');
Route::put('/movimentos/{movimento}', 'MovimentoController@update')->name('movimentos.update');

//Autenticacao
Route::get('/password', 'UtilizadorController@editPassword')->name('socios.editPassword');
Route::patch('/password', 'UtilizadorController@updatePassword')->name('socios.updatePassword');

});
Auth::routes(['verify' => true,'register' => false]);
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');


