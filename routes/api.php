<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StagiaireController;
use App\Http\Controllers\FiliereController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::get('/stagiaires', [StagiaireController::class,'index']);
Route::get('/stagiaires/{id}', [StagiaireController::class,'show']);
Route::delete('/stagiaires/{id}', [StagiaireController::class,'destroy']);
Route::post('/stagiaires',[StagiaireController::class,'store']);
//--------------------------------------------------------//
Route::get("/filieres",[FiliereController::class,"index"]);
Route::get("/filiere/{id}",[FiliereController::class,"show"]);
Route::delete('/filiere/{id}',[FiliereController::class,"destroy"]);
Route::post('/filieres', [FiliereController::class,"store"]);