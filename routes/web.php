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
    Route::get('admin','DashboardAdmin@index');
    Route::get('data-master','DashboardAdmin@datamaster');
});

// Route::group(['namespace' => 'Frontend'], function(){
//     Route::get('index','IndexController@index');
// });

Route::get('index', function(){
    return view('index');
});