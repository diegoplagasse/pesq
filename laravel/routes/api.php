<?php

use App\Http\Controllers\api\PerguntasController;
use App\Http\Controllers\api\PesquisasController;
use Illuminate\Support\Facades\Route;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::apiResources([
    'pesquisas' => PesquisasController::class,
    'perguntas' => PerguntasController::class
]);
