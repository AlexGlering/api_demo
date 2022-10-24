<?php

//Factories are used to seed database with initial values

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $type = $this ->faker->randomElement(['I', 'B']); //Individual or Business
        $name = $type == 'I' ? $this->faker->name() : $this->faker->company(); //if the customer is an Individual get a person name, else get a company name

        return [
            'name' => $name,
            'type' => $type,
            'email' => $this->faker->email(),
            'address' =>$this->faker->streetAddress(),
            'city' => $this->faker->city(),
            'postal_code' =>$this->faker->postcode()
        ];
    }
}
