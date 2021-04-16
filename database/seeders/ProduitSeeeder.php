<?php

namespace Database\Seeders;

use App\Models\Produit;
use Illuminate\Database\Seeder;

class ProduitSeeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Produit::create([
            "designation"=>"Ordinateurss",
            "description"=>"ffdsdd",
            "prix"=>3501254
        ]);

        Produit::create([
            "designation"=>"Telephoneze",
            "description"=>"phone",
            "prix"=>4587685
        ]);
    }
}
