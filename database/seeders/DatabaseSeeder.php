<?php

namespace Database\Seeders;

use App\Models\Produit;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
       $this->call([
            ProduitSeeeder::class,
            RoleSeeder::class,
           // CategorySeeder::class,
            
        ]);
        


       //Produit::factory(10)->create();
    }
}
