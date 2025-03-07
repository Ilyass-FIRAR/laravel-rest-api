<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MathsController;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function (){
    return view('hello');
});
Route::get('/', function (){
    return "<h2>Hello world</h2>" ;
});

Route::get('/somme/{a}/{b}' , function($a,$b){
    return "$a + $b =".($a+$b);
});
Route::get('/eq/{a}/{b}',[MathsController::class,'Equation'])
->where(['a'=>'[0-9]+','b'=>'[0-9]+']);
Route::get('/etoile/{n}',[MathsController::class,'Etoile']);
