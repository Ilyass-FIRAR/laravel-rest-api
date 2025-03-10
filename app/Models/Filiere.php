<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Filiere extends Model
{
    protected $primaryKey = 'codefiliere';
    public $incrementing = false;
    protected $keyType = 'string';
   
    protected $fillable = ['codefiliere', 'libellefiliere'];

    public function groupes()
    {
        return $this->hasMany(Groupe::class, 'codefiliere', 'codefiliere');
    }

}
