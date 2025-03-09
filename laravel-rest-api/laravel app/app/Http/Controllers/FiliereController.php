<?php

namespace App\Http\Controllers;

use App\Models\Filiere;
use Illuminate\Http\Request;

class FiliereController extends Controller
{
    public function index()
    {
        $filieres =  Filiere::all();
        $nbr = sizeof( $filieres);

        if($nbr==0)  
            return response()->json([
                    "message"=>"Aucune filiere trouvée!" ,
                    "data" => null  ,
                    "rows" =>$nbr ]  , 401); 
        else 
        return response()->json([
            "message"=>"$nbr filiere(s) trouvée(s)!" ,
            "data" =>$filieres   ,
            "rows" =>$nbr ]  , 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'codefiliere' => 'required|string|unique:filieres',
            'libellefiliere' => 'required|string',
        ]);
        return Filiere::create($request->all());
    }

    public function show($codefiliere)
    {
        $f =  Filiere::find($codefiliere);   
        if(!$f){
            return response()->json([
                "message"=>"Aucune filiere trouvée!" ,
                "data" => null 
                ]  , 401); 
        } 
        return response()->json([
            "message"=>"filiere trouvée" ,
            "data" =>$f   
            ]  , 200);
    }

    public function update(Request $request, $codefiliere)
    {
    
        $f =  Filiere::find($codefiliere);   
        if(!$f){
            return response()->json([
                "message"=>"Aucune filiere trouvée!" ,
                "data" => null 
                ]  , 401); 
        } 
        $f->update($request->all());
        return response()->json([
            "message"=>"filiere bien supprimée" ,
            "data" =>$f   
            ]  , 200);
    }

    public function destroy($codefiliere)
    {

        $f =  Filiere::find($codefiliere);   
        if(!$f){
            return response()->json([
                "message"=>"Aucune filiere trouvée!" ,
                "data" => null 
                ]  , 401); 
        } 
        $f->delete();
        return response()->json([
            "message"=>"filiere bien supprimée" ,
            "data" =>$f   
            ]  , 200);
    }


}
