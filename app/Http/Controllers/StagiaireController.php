<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stagiaire;
use Illuminate\Support\Facades\Validator;

class StagiaireController extends Controller
{
    public function index(){
        $stagiaires = Stagiaire::all();
        return response()->json($stagiaires);
    }
    public function show($id){
        $stagiaire=Stagiaire::find($id);
        if(!$stagiaire){
            return response()->json(["message"=>"Stagiaire introuvable"],401);
        }
        else return response()->json($stagiaire);
    }
    public function destroy($id){
        $stagiaire=Stagiaire::find($id);
        if(!$stagiaire){
            return response()->json(["message"=>"Stagiaire introuvable"],401);
        }else{
            $stagiaire->delete();
            return response()->json(["message"=>"Stagiaire supprime"],200);
        }

    }
    public function store(Request $request){
        $validator=Validator::make($request->all(),[
            "nom"=>"required|string|max:255",
            "prenom"=>"required|string|max:255",
            "datenaissance"=>"nullable|date",
            "poids"=>"nullable|numeric",
            "taille"=>"nullable|numeric",
            "photo"=>"nullable|image|mimes:jpg,jpge,png,gif,svg|max:2048",
            "email"=>"nullable|email|unique:stagiaires,email",
            "email"=>"nullable|string|max:20",
        ]);
        if($validator->fails()){
            return response()->json(["errors"=>$validator->errors(),422]);
        }
        $data=$request->all();
        if($request->hasFile("photo")){
            $photoPath=$request->file("photo")->store("stagiares","public");
            $data['photo']=$photoPath;
        }
        $stagiaire=Stagiaire::create($data);
        return response()->json($stagiaire,201);
    }
}
