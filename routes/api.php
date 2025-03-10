<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StagiaireController;
use App\Http\Controllers\FiliereController;
use App\Http\Controllers\GroupeController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/stagiaires'  , [StagiaireController::class , 'index']);
Route::get('/stagiaires/{id}'  , [StagiaireController::class , 'show']);
Route::post('/stagiaires'  , [StagiaireController::class , 'store']);
Route::delete('/stagiaires/{id}'  , [StagiaireController::class , 'destroy']);


Route::get('/filieres'  , [FiliereController::class , 'index']);
Route::get('/filieres/{codefiliere}'  , [FiliereController::class , 'show']);
Route::post('/filieres'  , [FiliereController::class , 'store']);
Route::delete('/filieres/{codefiliere}'  , [FiliereController::class , 'destroy']);
Route::put('/filieres/{codefiliere}'  , [FiliereController::class , 'update']);


Route::get('/groupes'  , [GroupeController::class , 'index']);
Route::get('/groupes/{codeGroupe}'  , [GroupeController::class , 'show']);
Route::post('/groupes'  , [GroupeController::class , 'store']);
Route::delete('/groupes/{codeGroupe}'  , [GroupeController::class , 'destroy']);
Route::put('/groupes/{codeGroupe}'  , [GroupeController::class , 'update']);