<?php

namespace Database\Seeders;

use App\Models\Charge;
use Illuminate\Database\Seeder;

class ChargeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Charge::create([
            'coin' => 'btc',
            'value' => '0'
        ]);

        Charge::create([
            'coin' => 'ltc',
            'value' => '0'
        ]);

        Charge::create([
            'coin' => 'doge',
            'value' => '0'
        ]);

        Charge::create([
            'coin' => 'eth',
            'value' => '0'
        ]);
    }
}
