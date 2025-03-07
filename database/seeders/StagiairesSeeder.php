<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Stagiaire;
use Carbon\Carbon;

class StagiairesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Stagiaire::insert([
            [
                'nom'=>"Allaoui",
                "prenom"=>"Ali",
                "datenaissance"=>Carbon :: create(2000,1,2),
                "poids"=>090.5,
                "taille"=>175,
                "photo"=>"Allaoui.png",
                "email"=>"Allao@gmail.com",
                "telephone"=>"060257418855",
                "created_at"=>now(),
                "updated_at"=>now()
            ],
            [
                'nom'=>"Hanafi",
                "prenom"=>"Salma",
                "datenaissance"=>Carbon :: create(2004,11,02),
                "poids"=>070.5,
                "taille"=>165,
                "photo"=>"Hanafi.png",
                "email"=>"Salma@gmail.com",
                "telephone"=>"062553008855",
                "created_at"=>now(),
                "updated_at"=>now()
            ]
            ]);
    }
}
