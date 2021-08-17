<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\OrderType;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
      $clients = Client::all();
      $statuses = OrderStatus::all();
      $types = OrderType::all();

      return [
        'client_id'         => $clients->random(),
        'status_id'         => $statuses->random(),
        'type_id'           => $types->random(),
        'serial_number'     => $this->faker->word,
        'part_number'       => $this->faker->word,
        'code'              => $this->faker->boolean() ? 'B12' : 'D123',
        'manufacturer'      => $this->faker->word,
        'model'             => $this->faker->word,
        'paid'              => $this->faker->boolean(),
        'deadline'          => Carbon::now()->addDays(rand(1,60)),
        'issue_description' => $this->faker->sentence(),
        'visual_description'=> $this->faker->sentence()
      ];
    }
}
