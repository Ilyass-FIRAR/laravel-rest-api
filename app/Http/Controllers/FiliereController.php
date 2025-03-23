<?php

namespace App\Http\Controllers;
use App\Models\Filiere;
use Illuminate\Http\Request;

class FiliereController extends Controller
{
    public function index(){
        $filieres=Filiere::all();
        return response()->json($filieres);
    }
}
