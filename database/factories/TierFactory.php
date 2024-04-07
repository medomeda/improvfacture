<?php

namespace Database\Factories;

use App\Models\Tva;
use Illuminate\Database\Eloquent\Factories\Factory;

class TierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code' => $this->faker->unique()->swiftBicNumber,
            'titre' => $this->faker->randomElement($array = array ('Mr','Mme','Mlle','Ste')),
            'typetier_id' => $this->faker->randomElement([1, 2, 3]),
            'nom' => $this->faker->lastName,
            'prenoms' => $this->faker->firstName,
            'numerocompte' => $this->faker->creditCardNumber,
            'datenaissance' => $this->faker->dateTimeBetween($startDate = '-50 years', $endDate = '-22 years', $timezone = null),
            'telephone' =>  $this->faker->phoneNumber,
            'email' =>  $this->faker->unique()->safeEmail,
            'fax' => $this->faker->phoneNumber,
            'boitepostale' => $this->faker->streetAddress,
            'echeance' => $this->faker->randomElement([5, 10, 15, 30]),
            'assujetva' => $this->faker->boolean,
            'tva_id' => Tva::all()->random()->id,
            'representantnomprenoms' => $this->faker->name,
            'representantcontacts' =>  $this->faker->phoneNumber,
            'inactif' =>  $this->faker->boolean,

        ];
    }
}
