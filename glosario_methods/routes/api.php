<?php

use App\Http\Controllers\ConceptosController;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/




Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/registerConcept',[ConceptosController::class, 'register']);
Route::delete('/deleteConcept/{id}',[ConceptosController::class,'delete']);
Route::get('/index',[ConceptosController::class,'index']);

Route::post('/login', [UserController::class, 'login']);
Route::post('/register', [UserController::class, 'register']);
Route::middleware('auth:sanctum')->group(function (){
    Route::get('/logout', [UserController::class, 'logout']);
});
