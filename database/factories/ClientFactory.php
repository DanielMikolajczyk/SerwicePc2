<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\ClientType;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Client::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
      $clientTypes = ClientType::all();
        return [
            'first_name'    => $this->faker->firstName(),
            'middle_name'   => $this->faker->boolean() ? $this->faker->firstName() : null,
            'last_name'     => $this->faker->lastName(),
            'type_id'       => $clientTypes->random()->id,
            'phone_number'  => $this->faker->phoneNumber(),
            'email'         => $this->faker->unique()->safeEmail(),
            'address'       => $this->faker->address(),
            'description'   => $this->faker->realText($this->faker->numberBetween(10,20)),
        ];
    }
}
