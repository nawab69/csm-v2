<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SettingSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(MenuSeeder::class);
        $this->call(WalletSeeder::class);
        $this->call(BalanceSeeder::class);
        $this->call(PaymentMethodSeeder::class);
        $this->call(MethodSeeder::class);
        $this->call(OfferSeeder::class);
        $this->call(ChargeSeeder::class);
    }
}
