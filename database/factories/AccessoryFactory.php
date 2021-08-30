<?php

namespace Database\Factories;

use App\Models\Accessory;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class AccessoryFactory extends Factory
{
  /**
   * The name of the factory's corresponding model.
   *
   * @var string
   */
  protected $model = Accessory::class;

  /**
   * Define the model's default state.
   */
  public function definition(): array
  {
    return [
      'name'        => $this->faker->word,
      'order_id'    => Order::all()->random()->id,
      'image_url'   => null,
      'description' => $this->faker->sentence,
    ];
  }
}
