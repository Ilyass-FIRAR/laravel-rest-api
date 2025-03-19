<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Groupe extends Model
{
    protected $fillable = ['codeGroupe', 'anneeformation', 'codefiliere'];

    public function filiere()
    {
        return $this->belongsTo(Filiere::class, 'codefiliere', 'codefiliere');
    }

    public function inscriptions()
    {
        return $this->hasMany(Inscription::class, 'codegroupe', 'codeGroupe');
    }
   
}
