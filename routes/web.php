<?php

use Illuminate\Http\Request;
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


Route::get('/user', function (Request $request) {
})->middleware('auth:api');

Route::get('/', function (Request $request) {
    $data = [
        "name" => "mimin",
        "sesi" => $request->expectsJson()
    ];

    return view('index');
});
Route::view('/login', 'login')->name('login');
