<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Withdraw;
use Illuminate\Database\Eloquent\Factories\Factory;

class WithdrawFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Withdraw::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => 2,
            'trx_id'  => $this->faker->uuid,
            'bank_id' => User::find(2)->banks->first()->id,
            'amount'  => $amount = $this->faker->numberBetween(100,5000),
            'fee'     => 2.5,
            'total'   => $amount + 2.5,
            'currency_id' => $this->faker->numberBetween(1,4),
            'note'    => $this->faker->text(),
            'status'  => 'pending',
        ];
    }
}
