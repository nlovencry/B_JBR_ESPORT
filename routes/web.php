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
});

Route::group(['namespace' => 'Backend'], function(){
<<<<<<< Updated upstream
    Route::get('admin','DashboardAdmin@admin');
    Route::get('coach','DashboardAdmin@coach');
    Route::resource('datagame','DataGameController');
    Route::resource('dataplayer','DataPlayerController');
    Route::resource('datacoach','DataCoachController');
    Route::get('player','DataPlayerController@player');
    Route::put('datacoach/nonactive/{datacoach}','DataCoachController@nonactive')->name('datacoach.nonactive');
    Route::put('datacoach/active/{datacoach}','DataCoachController@active')->name('datacoach.active');
    Route::put('dataplayer/nonactive/{dataplayer}','DataPlayerController@nonactive')->name('dataplayer.nonactive');
    Route::put('dataplayer/active/{dataplayer}','DataPlayerController@active')->name('dataplayer.active');
});

Route::group(['namespace' => 'Frontend'], function(){
    Route::get('index','HomepageController@index');
=======
    Route::get('admin','DashboardAdmin@index');
    Route::get('data-game','DataGameController@index');
    Route::resource('datagame','DataGameController');
});

Route::get('index', function(){
    return view('index');
>>>>>>> Stashed changes
});