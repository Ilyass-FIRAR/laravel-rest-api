<?php

namespace App\Http\Controllers;

use App\Models\Stagiaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StagiaireController extends Controller
{
    public function index()
    {
        $stagiaires = Stagiaire::all();
        $nbr =  sizeof($stagiaires);
        $_stagiaire = "stagiaires";
        $_exist =  "trouvés";
        if($nbr==1) {
            $_stagiaire = "stagiaire";
            $_exist =  "trouvé";
        }
        
        if($nbr==0)  
            return response()->json([
                    "message"=>"Aucun stagiaire trouvé!" ,
                    "data" => null  ,
                     "rows" =>$nbr ]  , 401); 
        else 
        return response()->json([
            "message"=>"$nbr $_stagiaire $_exist" ,
            "data" =>$stagiaires   ,
            "rows" =>$nbr ]  , 200); 
    }
    public function show($id)
        {
            $stagiaire = Stagiaire::find($id);
            if(!$stagiaire) {
                return response()->json(["message"=>"Stagiaire introuvable"]  , 401);
            } else  return response()->json($stagiaire);
        }
    
        public function destroy($id)
        {
          $stagiaire = Stagiaire::find($id);
          if(!$stagiaire) {
              return response()->json(["message"=>"Stagiaire introuvable"]  , 401);
          } else  {
              $stagiaire->delete();
              return response()->json(["message"=>"Stagiaire supprimé"]  , 200);
          }
        }
    public function store(Request $request)
        {
            $validator = Validator::make($request->all(), [
                'nom' => 'required|string|max:255',
                'prenom' => 'required|string|max:255',
                'datenaissance' => 'nullable|date',
                'poids' => 'nullable|numeric',
                'taille' => 'nullable|numeric',
                'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'email' => 'nullable|email|unique:stagiaires,email',
                'telephone' => 'nullable|string|max:20',
            ] , 
            [
                'nom.required' => 'Le nom est un champ obligatoire!',
                'datenaissance.date' => 'Format de la date est incorrect!!',
            ]
            );
      
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }
      
            $data = $request->all();
      
            if ($request->hasFile('photo')) {
                $photoPath = $request->file('photo')->store('stagiaires', 'public'); // Stocker dans le dossier public/stagiaires
                $data['photo'] = $photoPath;
            }
      
            $stagiaire = Stagiaire::create($data);
            return response()->json($stagiaire, 201);
        }
}
