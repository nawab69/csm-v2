<?php

namespace Database\Factories;

use App\Models\Sellcard;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SellcardFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Sellcard::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => 2,
            'trx_id' => Str::orderedUuid(),
            'giftcard_id' => $this->faker->numberBetween(1,4),
            'amount' => $amount = $this->faker->numberBetween(20,100),
            'get_amount' => $amount * 0.95,
            'currency'   => 'usd',
            'note'       => $this->faker->realText(100),
            'status'     => 'pending',
        ];
    }
}
