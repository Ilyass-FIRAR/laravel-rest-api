<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stagiaire extends Model
{
    protected $fillable = [
        'nom',
        'prenom',
        'datenaissance',
        'poids',
        'taille',
        'photo',
        'email',
        'ville',
        'telephone',
    ];
    
}
