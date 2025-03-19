<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Stagiaire;
use Carbon\Carbon;

class StagiaireTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Stagiaire::insert([
            [
                'nom' => 'Allaoui',
                'prenom' => 'Ali',
                'datenaissance' => Carbon::create(2000, 1, 1),
                'poids' => 070.5,
                'taille' => 175,
                'email' => 'allaoui.ali@example.com',
                'telephone' => '0123456789',
                'created_at' => now(),
                'updated_at' => now(),

            ]
        ]);
    }
}
