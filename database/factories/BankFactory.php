<?php

namespace Database\Factories;

use App\Models\Bank;
use Illuminate\Database\Eloquent\Factories\Factory;

class BankFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Bank::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1,2),
            'bank_name' => $this->faker->company,
            'account_holder' => $this->faker->name,
            'account_no' => $this->faker->bankAccountNumber,
            'swift_code' => $this->faker->swiftBicNumber,
            'branch_details' => $this->faker->address,
        ];
    }
}
