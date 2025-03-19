<?php

namespace Database\Seeders;

use App\Models\Stagiaire;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            StagiaireTableSeeder::class
        ]);

        // User::factory(10)->create();

       
    }
}
