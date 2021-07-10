<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

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
    Route::get('register','AuthController@showFormRegister');
    Route::get('login', 'AuthController@showFormLogin');
    Route::post('register', 'AuthController@register')->name('register');
    Route::post('login', 'AuthController@login')->name('login');
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

// Route::get('logout','App\Http\Controllers\Backend\AuthController@logout')->name('logout');

// Route::group(['middleware' => 'auth'], function () {
//     Route::get('home', [HomeController::class, 'index'])->name('home');
//     Route::get('logout', [AuthController::class, 'logout'])->name('logout');
// });

Route::group(['namespace' => 'Frontend'], function(){
    Route::get('index','HomepageController@index');
});

// Route::group(['middleware' => ['auth']], function (){
//     Route::group(['middleware' => ['cek_login:admin']], function (){
//         Route::get('admin','Backend\DashboardAdmin@admin');
//     });
//     Route::group(['middleware' => ['cek_login:coach']], function (){
//         Route::get('coach','Backend\DashboardAdmin@coach');
//     });
// });