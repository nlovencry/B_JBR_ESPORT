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

Route::group(['namespace' => 'Backend'], function(){
    Route::get('register_show','AuthController@showFormRegister');
    Route::get('login_show', 'AuthController@showFormLogin');
    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');
    Route::get('admin','DashboardAdmin@admin');
    Route::get('coach','DashboardAdmin@coach');
    Route::resource('player','PlayerController');
    Route::resource('datagame','DataGameController');
    Route::resource('dataplayer','DataPlayerController');
    Route::resource('datacoach','DataCoachController');
    Route::resource('datajadwal','DataJadwalController');
    Route::resource('dataevent','DataEventController');
    Route::put('datacoach/nonactive/{datacoach}','DataCoachController@nonactive')->name('datacoach.nonactive');
    Route::put('datacoach/active/{datacoach}','DataCoachController@active')->name('datacoach.active');
    Route::put('dataplayer/nonactive/{dataplayer}','DataPlayerController@nonactive')->name('dataplayer.nonactive');
    Route::put('dataplayer/active/{dataplayer}','DataPlayerController@active')->name('dataplayer.active');
    
    
    
});


Route::group(['namespace' => 'Frontend'], function(){
    Route::get('index','HomepageController@index');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('home');