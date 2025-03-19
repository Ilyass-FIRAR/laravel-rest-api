<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StagiairesController;
use App\Http\Controllers\FiliereController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::get('/stagiaires'  , [StagiairesController::class , 'index']);
Route::get('/stagiaires/{id}'  , [StagiairesController::class , 'show']);
Route::delete('/stagiaires/{id}'  , [StagiairesController::class , 'destroy']);
Route::post('/stagiaires'  , [StagiairesController::class , 'store']);
