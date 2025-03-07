<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Filiere extends Model
{
   protected $fillable=[
    'nom',
    'massehoraire',
    'coeff',
    "eff",
    'created_at',
    'updated_at',
    ];
}
