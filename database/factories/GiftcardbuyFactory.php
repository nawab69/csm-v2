<?php

namespace Database\Factories;

use App\Models\Giftcardbuy;
use Illuminate\Database\Eloquent\Factories\Factory;

class GiftcardbuyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Giftcardbuy::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'usd_rate' => $this->faker->numberBetween(0.95,1.05),
            'naira_rate' => $this->faker->numberBetween(0.90,1.15),
            'status' => true,
        ];
    }
}
