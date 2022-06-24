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

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return 'DONE'; //Return anything
});

Route::group(['namespace' => 'Backend', 'middleware' => ['auth','admin']], function(){
    Route::get('admin','DashboardAdmin@admin')->name('admin');
    Route::resource('datagame','DataGameController');
    Route::resource('dataplayer','DataPlayerController');
    Route::resource('datacoach','DataCoachController');
    Route::resource('dataevent','DataEventController');
    Route::put('datacoach/nonactive/{datacoach}','DataCoachController@nonactive')->name('datacoach.nonactive');
    Route::put('datacoach/active/{datacoach}','DataCoachController@active')->name('datacoach.active');
    Route::put('dataplayer/nonactive/{dataplayer}','DataPlayerController@nonactive')->name('dataplayer.nonactive');
    Route::put('dataplayer/active/{dataplayer}','DataPlayerController@active')->name('dataplayer.active');
});

Route::group(['namespace' => 'Backend', 'middleware' => ['auth','coach']], function(){
    Route::get('coach','DashboardAdmin@coach')->name('coach');
    Route::resource('player','PlayerController');
    Route::resource('datajadwal','DataJadwalController');
    Route::resource('datateam','DataTeamController');
    Route::resource('detailteam','DetailTeamController');
    Route::post('profile/ubah','ProfileController@ubah')->name('profile.ubah');
    Route::resource('profile','ProfileController');
    Route::resource('detailjadwal','DetailJadwalController');
    Route::put('player/nonactive/{player}','PlayerController@nonactive')->name('player.nonactive');
    Route::put('player/active/{player}','PlayerController@active')->name('player.active');
    Route::put('detailteam/remove/{detailteam}','DetailTeamController@remove')->name('detailteam.remove');
});

Route::group(['namespace' => 'Frontend'], function(){
    Route::get('/','HomepageController@index')->name('index');
    Route::resource('allteam','AllTeamController');
    Route::get('jadwal','JadwalController@index')->name('jadwal');
    Route::resource('profil','ProfileController');
    Route::resource('tournament','TournamentController');
});

Auth::routes();

Route::get('/error', function () {
    return view('error');
  })->name('error.403');