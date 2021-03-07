<?php

namespace Database\Seeders;

use App\Models\Balance;
use App\Models\Currency;
use Illuminate\Database\Seeder;

class BalanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Currency::create([
           'name' => 'USD',
           'code' => 'usd',
           'display' => '$',
           'default_rate' => 1,
        ]);
        Currency::create([
            'name' => 'EURO',
            'code' => 'eur',
            'display' => '€',
            'default_rate' => 0.81,
        ]);
        Currency::create([
            'name' => 'GBP',
            'code' => 'gbp',
            'display' => '£',
            'default_rate' => 0.75,
        ]);
        Currency::create([
            'name' => 'NAIRA',
            'code' => 'ngn',
            'display' => 'NAIRA',
            'default_rate' => 381,
        ]);

        // USER 1

        Balance::create([
           'user_id' => 1,
           'currency_id' => 1,
           'balance' => 10000,
           'escrow'  => 0
        ]);
        Balance::create([
            'user_id' => 1,
            'currency_id' => 2,
            'balance' => 10000,
            'escrow'  => 0
        ]);
        Balance::create([
            'user_id' => 1,
            'currency_id' => 3,
            'balance' => 10000,
            'escrow'  => 0
        ]);
        Balance::create([
            'user_id' => 1,
            'currency_id' => 4,
            'balance' => 10000,
            'escrow'  => 0
        ]);

        // USER 2

        Balance::create([
            'user_id' => 2,
            'currency_id' => 1,
            'balance' => 10000,
            'escrow'  => 0
        ]);
        Balance::create([
            'user_id' => 2,
            'currency_id' => 2,
            'balance' => 10000,
            'escrow'  => 0
        ]);
        Balance::create([
            'user_id' => 2,
            'currency_id' => 3,
            'balance' => 10000,
            'escrow'  => 0
        ]);
        Balance::create([
            'user_id' => 2,
            'currency_id' => 4,
            'balance' => 10000,
            'escrow'  => 0
        ]);

        // USER 3

        Balance::create([
            'user_id' => 3,
            'currency_id' => 1,
            'balance' => 10000,
            'escrow'  => 0
        ]);
        Balance::create([
            'user_id' => 3,
            'currency_id' => 2,
            'balance' => 10000,
            'escrow'  => 0
        ]);
        Balance::create([
            'user_id' => 3,
            'currency_id' => 3,
            'balance' => 10000,
            'escrow'  => 0
        ]);
        Balance::create([
            'user_id' => 3,
            'currency_id' => 4,
            'balance' => 10000,
            'escrow'  => 0
        ]);


    }
}
