<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;


//Route::post('/register', 'Auth\AuthController@store');
Route::post('/register', [AuthController::class, 'store']);

Route::get('/', function () {
    return view('welcome');
});
