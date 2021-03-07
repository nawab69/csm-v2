<?php

namespace Database\Factories;

use App\Models\Deposit;
use Illuminate\Database\Eloquent\Factories\Factory;

class DepositFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Deposit::class;

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
            'bank_name' => $this->faker->company,
            'account_holder' => $this->faker->name,
            'account_no' => $this->faker->bankAccountNumber,
            'swift_code' => $this->faker->swiftBicNumber,
            'branch_details' => $this->faker->address,
            'amount'  => $this->faker->numberBetween(10,50000),
            'currency_id' => $this->faker->numberBetween(1,4),
            'note' => $this->faker->realText(),
            'status' => 'pending'
        ];
    }
}
