<?php

namespace Database\Factories;

use App\Models\Tva;
use App\Models\Unite;
use App\Models\Article;
use App\Models\Categorie;
use App\Models\Typearticle;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'reference' => $this->faker->unique()->swiftBicNumber,
            'designation' => $this->faker->sentence,
            'description' => $this->faker->text,
            'prixachat' => $this->faker->numberBetween($min = 1000, $max = 900000),
            'prixvente' => $this->faker->numberBetween($min = 2000, $max = 900000),
            'categorie_id' => Categorie::all()->random()->id,
            'typearticle_id' => Typearticle::all()->random()->id,
            'tva_id' => Tva::all()->random()->id,
            'unite_id' => Unite::all()->random()->id,
            'photo' => 'images/cars/cima_1912_top_01.jpg.ximg.l_full_m.smart.jpg',

        ];
    }
}
