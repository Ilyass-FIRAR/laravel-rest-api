<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    protected $fillable = ['dateinscription', 'codegroupe', 'idstagiaire'];

    public function groupe()
    {
        return $this->belongsTo(Groupe::class, 'codegroupe', 'codeGroupe');
    }

    public function stagiaire()
    {
        return $this->belongsTo(Stagiaire::class, 'idstagiaire', 'id');
    }

}
