<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Filiere;
use Carbon\Carbon;

class FilieresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        

    Filiere::insert([
        [
            'nom'=>"React js",
            'massehoraire'=>120,
            'coeff'=>3,
            "eff"=>true,
            "created_at"=> now(),
            "updated_at"=> now()
        ],[
            'nom'=>"Laravel",
            'massehoraire'=>140,
            'coeff'=>3,
            "eff"=>true,
            "created_at"=> now(),
            "updated_at"=> now()
        ],[
            'nom'=>"html",
            'massehoraire'=>70,
            'coeff'=>2,
            "eff"=>false,
            "created_at"=> now(),
            "updated_at"=> now()
        ]
    ]);
    }
}
