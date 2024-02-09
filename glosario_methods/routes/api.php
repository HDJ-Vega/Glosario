<?php

use App\Http\Controllers\ConceptosController;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [UserController::class, 'login']);
Route::post('/register', [UserController::class, 'register']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/logout', [UserController::class, 'logout']);
    Route::post('/registerConcept', [ConceptosController::class, 'register']);
    Route::delete('/deleteConcept/{id}', [ConceptosController::class, 'delete']);
    // Route::get('/index', [ConceptosController::class, 'index']);

});

// Lo puse asi por la validacion del login
Route::get('/index', [ConceptosController::class, 'index']);
