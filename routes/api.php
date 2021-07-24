<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\auth;
use App\Http\Controllers\Api\Apievent;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['namespace' => 'Api'] ,function(){
    Route::get('/event','Apievent@index')->name('apievent.index');
    Route::get('/event/{id_event}','Apievent@show')->name('apievent.show');
    Route::get('/jadwal','Apijadwal@index')->name('apijadwal.index');
    Route::get('/jadwal/{id_jadwal}','Apijadwal@show')->name('apijadwal.show');
    Route::get('/team','Apiteam@index')->name('apiteam.index');
    Route::get('/team/{id_team}','Apiteam@show')->name('apiteam.show');
    Route::get('/game','Apigame@index')->name('apigame.index');
    Route::get('/game/{id_game}','Apigame@show')->name('apigame.show');
});
Route::post('/login', [auth::class, 'login']);
Route::get('users/{id}', function ($id) {

});


Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/logout', [auth::class, 'logout']);
});


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});