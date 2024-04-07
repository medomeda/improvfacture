<?php

namespace Database\Seeders;

use App\Models\Tier;
use App\Models\Article;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Database\Seeders\CategoriesTableSeeder;

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
        $this->call(UsersTableSeeder::class);

        $this->call(CategoriesTableSeeder::class);

        DB::table('typearticles')->insert([
            ['name' => 'Produit', 'created_at' => now()],
            ['name' => 'Service','created_at' => now()],
        ]);

        DB::table('unites')->insert([
            ['name' => 'Mètre', 'created_at' => now()],
            ['name' => 'Litre','created_at' => now()],
            ['name' => 'Kg','created_at' => now()],
            ['name' => 'Pièce','created_at' => now()],
        ]);

        DB::table('tvas')->insert([
            ['name' => 'Normal','taux' => 18, 'created_at' => now()],
            ['name' => 'ASDI','taux' => 15, 'created_at' => now()],
        ]);


        Article::factory(100)->create();

        Tier::factory(300)->create();


    }
}
