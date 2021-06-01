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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/users', function(){
    return \App\Models\User::all()->except(auth()->user()->id);
});

Route::get('/user', function(){
    return \App\Models\User::all()->except(auth()->user()->id)->first();
});

Route::get('/chat/{user}', [App\Http\Controllers\ChatController::class, 'index'] );
Route::post('/chat/{user}', [App\Http\Controllers\ChatController::class, 'store'] );
