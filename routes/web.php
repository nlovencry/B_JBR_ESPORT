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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['namespace' => 'Backend'], function(){
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

    Route::get('login', [AuthController::class, 'showFormLogin'])->name('login');
    Route::post('login', [AuthController::class, 'login']);
    Route::get('register', [AuthController::class, 'showFormRegister'])->name('register');
    Route::post('register', [AuthController::class, 'register']);
 
    Route::group(['middleware' => 'auth'], function () {
 
    Route::get('home', [HomeController::class, 'index'])->name('home');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
 
});
});

Route::group(['namespace' => 'Frontend'], function(){
    Route::get('index','HomepageController@index');
});