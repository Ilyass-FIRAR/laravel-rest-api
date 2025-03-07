<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Filiere;
use Illuminate\Support\Facades\Validator;

class FiliereController extends Controller
{
    public function index(){
        $filieres=Filiere::all();
        return response()->json($filieres);
    }
    public function show($id){
        $filiere=Filiere::find($id);
        if(!$filiere){
            return response()->json(["message"=>"filiere introuvable"],401);
        }else return response()->json($filiere);
    }
    public function destroy($id){
        $filiere=Filiere::find($id);
        if(!$filiere){
            return response()->json(["message"=>"filiere introuvable"],401);

        }else {
            $filiere->delete();
            return response()->json(["message"=>"filiere supprimée"],201);
        }
    }
    public function store(Request $request){
        $validator=Validator::make($request->all(),[
            'nom'=>'required|string|max:255',
            'massehoraire'=>'nullable|numeric',
            'coeff'=>'nullable|numeric',
            "eff"=>'required|boolean',
        ]);
        if($validator->fails()){
            return response()->json(["errors "=>$validator->errors()],422);    
        }
        $data=$request->all();
        $filiere=Filiere::create($data);
        return response()->json($filiere,201);
    }
}
