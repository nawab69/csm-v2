<?php

namespace Database\Seeders;

use App\Models\Method;
use Illuminate\Database\Seeder;

class MethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Method::create([
           'name' => 'Paypal',
           'type' => 'Online Bank',
           'status' => 1
        ]);
        Method::create([
            'name' => 'Payoneer',
            'type' => 'Online Bank',
            'status' => 1
        ]);
        Method::create([
            'name' => 'Payza',
            'type' => 'Online Bank',
            'status' => 1
        ]);
        Method::create([
            'name' => 'Skrill',
            'type' => 'Online Bank',
            'status' => 1
        ]);
        Method::create([
            'name' => 'Netteler',
            'type' => 'Online Bank',
            'status' => 1
        ]);
        Method::create([
            'name' => 'Perfect Money',
            'type' => 'Online Bank',
            'status' => 1
        ]);
        Method::create([
            'name' => 'Wire Transfer',
            'type' => 'Bank',
            'status' => 1
        ]);
        Method::create([
            'name' => 'Google Play Gift Card',
            'type' => 'Gift Card',
            'status' => 1
        ]);
        Method::create([
            'name' => 'Local Bank Transfer',
            'type' =>  'Local Bank',
            'status' => 1
        ]);
        Method::create([
            'name' => 'Ucash',
            'type' => 'Online Bank',
            'status' => 1
        ]);
        Method::create([
            'name' => 'Ethereum',
            'type' => 'Cryptocurrency',
            'status' => 1
        ]);
        Method::create([
            'name' => 'Tron',
            'type' => 'Cryptocurrency',
            'status' => 1
        ]);
        Method::create([
            'name' => 'Steam Gift Card',
            'type' => 'Gift Card',
            'status' => 1
        ]);
//        Method::create([
//            'name' => 'Netflix Gift Card',
//            'type' => 'Gift Card',
//            'status' => 1
//        ]);
    }
}
