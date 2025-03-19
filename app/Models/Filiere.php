<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Filiere extends Model
{
   protected $fillable=['codefiliere','libellefiliere'];
   
public function groupes(){
return $this->hasMany(Group::class,'codefiliere','codefiliere');
   }
}
