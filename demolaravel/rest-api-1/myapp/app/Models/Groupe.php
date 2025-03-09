<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Groupe extends Model
{

    protected $primaryKey = 'codeGroupe';
    public $incrementing = false;
    protected $keyType = 'string';

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
