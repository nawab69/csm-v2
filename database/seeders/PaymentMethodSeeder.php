<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PaymentMethod::create([
           'name' => 'Paypal',
           'details' => 'nawabkibria12@gmail.com',
        ]);
        PaymentMethod::create([
            'name' => 'Skrill',
            'details' => 'nawabkibria12@gmail.com',
        ]);
        PaymentMethod::create([
            'name' => 'Netteler',
            'details' => 'nawabkibria12@gmail.com',
        ]);
        PaymentMethod::create([
            'name' => 'Payoneer',
            'details' => 'nawabkibria12@gmail.com',
        ]);
        PaymentMethod::create([
            'name' => 'Perfect Money',
            'details' => 'U62437h4444rf',
        ]);
        PaymentMethod::create([
            'name' => 'Payza',
            'details' => 'U62437',
        ]);
        PaymentMethod::create([
            'name' => 'Monero',
            'details' => 'U6243hdsfgydfstasdytae7rqhjHJFtr76d7',
        ]);
    }
}
