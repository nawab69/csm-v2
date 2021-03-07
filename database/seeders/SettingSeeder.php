<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // General Settings
        Setting::updateOrCreate(['name' => 'site_title','value' => 'CryptoStreetMarket']);
        Setting::updateOrCreate(['name' => 'site_description','value' => 'crypto wallet with many fetures.']);
        Setting::updateOrCreate(['name' => 'site_address','value' => 'Nigeria']);
        // Logo Settings
        Setting::updateOrCreate(['name' => 'site_logo','value' => 'logo.png']);
        Setting::updateOrCreate(['name' => 'site_favicon','value' => null]);
        // Mail Settings
        Setting::updateOrCreate(['name' => 'mail_mailer','value' => 'smtp']);
        Setting::updateOrCreate(['name' => 'mail_host','value' => 'smtp.mailtrap.io']);
        Setting::updateOrCreate(['name' => 'mail_port','value' => '2525']);
        Setting::updateOrCreate(['name' => 'mail_username','value' => 'dd76330c2977d9']);
        Setting::updateOrCreate(['name' => 'mail_password','value' => 'e0a745000dfe4d']);
        Setting::updateOrCreate(['name' => 'mail_encryption','value' => 'TLS']);
        Setting::updateOrCreate(['name' => 'mail_from_address','value' => 'admin@cryptostreetmarket.com']);
        Setting::updateOrCreate(['name' => 'mail_from_name','value' => 'CryptoStreetMarket']);

        // Socialite Settings
        Setting::updateOrCreate(['name' => 'facebook_client_id','value' => null]);
        Setting::updateOrCreate(['name' => 'facebook_client_secret','value' => null]);

        Setting::updateOrCreate(['name' => 'google_client_id','value' => null]);
        Setting::updateOrCreate(['name' => 'google_client_secret','value' => null]);

        Setting::updateOrCreate(['name' => 'github_client_id','value' => null]);
        Setting::updateOrCreate(['name' => 'github_client_secret','value' => null]);

        // BlockIo Settings
        Setting::updateOrCreate(['name' => 'btc_api','value' => '5e64-0be4-3578-f10f']);
        Setting::updateOrCreate(['name' => 'ltc_api','value' => '9ea1-b3d7-9e9d-b609']);
        Setting::updateOrCreate(['name' => 'doge_api','value' => '0cd1-4ed7-031e-c2c3']);
        Setting::updateOrCreate(['name' => 'blockio_pin','value' => 'devnawab20']);

        // BlockIo Settings
//        Setting::updateOrCreate(['name' => 'btc_api','value' => '7bc5-13e7-ac32-f3b6']);
//        Setting::updateOrCreate(['name' => 'ltc_api','value' => '7876-8a2b-0cf6-0907']);
//        Setting::updateOrCreate(['name' => 'doge_api','value' => 'b895-f04c-8511-8a55']);
//        Setting::updateOrCreate(['name' => 'blockio_pin','value' => 'CryptoStreetMarket20']);

        // Fee Settings

        Setting::updateOrCreate(['name' => 'fee_send_usd', 'value' => 2.5]);
        Setting::updateOrCreate(['name' => 'fee_send_naira', 'value' => 2.5]);
        Setting::updateOrCreate(['name' => 'fee_withdraw_usd', 'value' => 2.5]);
        Setting::updateOrCreate(['name' => 'fee_withdraw_naira', 'value' => 2.5]);
        Setting::updateOrCreate(['name' => 'fee_sell', 'value' => 1.5]);
        Setting::updateOrCreate(['name' => 'fee_buy', 'value' => 1.5]);
        Setting::updateOrCreate(['name' => 'naira_rate', 'value' => 420]);
        Setting::updateOrCreate(['name' => 'trade_fee', 'value' => 1]);
        Setting::updateOrCreate(['name' => 'bank_name', 'value' => 'Bank_name']);
        Setting::updateOrCreate(['name' => 'account_no', 'value' => 'Account No']);
        Setting::updateOrCreate(['name' => 'account_holder', 'value' => 'Account Holder']);
        Setting::updateOrCreate(['name' => 'swift_code','value' => 'Swift code']);
        Setting::updateOrCreate(['name' => 'bank_details','value' => 'Bank Details']);
        Setting::updateOrCreate(['name'=> 'notify_mail','value'=> 'nawabkhairuzzaman@gmail.com']);
    }
}