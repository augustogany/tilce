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
    //$diactual = \Carbon\Carbon::today()->day;
    //return $year = \App\Box::whereDay('updated_at',$diactual)->get();
    return view('welcome');
});
