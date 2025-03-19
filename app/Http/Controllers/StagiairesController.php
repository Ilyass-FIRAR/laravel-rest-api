<?php

namespace App\Http\Controllers;
use App\Models\Stagiaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StagiairesController extends Controller
{
    public function index(){
        $stagiaires = Stagiaire::all();
        return response()->json($stagiaires);
    }
    public function show($id){
        $stagiaires = Stagiaire::find($id);
        if(!$stagiaires){
            return response()->json(["message"=>"Stagiaire Introuvable"],401);
        }
        else return response()->json($stagiaires); 
    }
    public function store(Request $request)
  {
      $validator = Validator::make($request->all(), [
          'nom' => 'required|string|max:255',
          'prenom' => 'required|string|max:255',
          'datenaissance' => 'nullable|date',
          'poids' => 'nullable|numeric',
          'taille' => 'nullable|numeric',
          'email' => 'nullable|email|unique:stagiaires,email',
          'telephone' => 'nullable|string|max:20',
      ]);

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
