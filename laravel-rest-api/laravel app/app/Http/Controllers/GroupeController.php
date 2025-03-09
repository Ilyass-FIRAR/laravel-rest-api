<?php

namespace App\Http\Controllers;

use App\Models\Groupe;
use Illuminate\Http\Request;

class GroupeController extends Controller
{
    public function index()
    {
        return Groupe::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'codeGroupe' => 'required|string|unique:groupes',
            'anneeformation' => 'required|integer',
            'codefiliere' => 'required|string|exists:filieres,codefiliere',
        ]);
        return Groupe::create($request->all());
    }

    public function show($codeGroupe)
    {
        return Groupe::findOrFail($codeGroupe);
    }

    public function update(Request $request, $codeGroupe)
    {
        $groupe = Groupe::findOrFail($codeGroupe);
        $groupe->update($request->all());
        return $groupe;
    }

    public function destroy($codeGroupe)
    {
        $groupe = Groupe::findOrFail($codeGroupe);
        $groupe->delete();
        return response()->json(null, 204);
    }

}
