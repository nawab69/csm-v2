<?php

namespace Database\Seeders;

use App\Models\Eth;
use App\Models\Reserve;
use App\Models\Twallet;
use App\Models\Wallet;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Crypt;

class WalletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Wallet::updateOrCreate([
            'user_id'       => 1,
            'btc_address'   => '2NGBEpcititXfYVLBoXGgMMC4ygbprpTqdH',
            'ltc_address'   => 'Qip1jMGtS5rsoTBm4bkGELMhyT68eF7Lbg',
            'doge_address'  => '2NACK77fBC1yj8t2pfB6gLdYwSVygwqwu7p',
            'usd'           => 0,
            'naira'         => 0
        ]);

        Wallet::updateOrCreate([
            'user_id'       => 2,
            'btc_address'   => '2N31hZnc5QST8yvTHmS4aB9CTrKSF2MftBE',
            'ltc_address'   => 'QVintMBP7Bxqb1kJeQngEXt2v6n4rUZB9C',
            'doge_address'  => '2N4meM7gnaG6vKmf4Ebo73WtZb8nEQkLgdC',
            'usd'           => 0,
            'naira'         => 0
        ]);

        Wallet::updateOrCreate([
            'user_id'       => 3,
            'btc_address'   => '2NEYG1nZoqUxDRhEJdoQYJCSYgRcT6YfWbQ',
            'ltc_address'   => 'QWADDf8BboqGUE3ijrkFCRyiZX5E5iPGWp',
            'doge_address'  => '2N5CwPvtoqjELuxAfbv8WyvX8fVii61oKMt',
            'usd'           => 0,
            'naira'         => 0
        ]);

        Twallet::updateOrCreate([
           'user_id' => 1,
        ]);
        Twallet::updateOrCreate([
            'user_id' => 2,
        ]);
        Twallet::updateOrCreate([
            'user_id' => 3,
        ]);

        // For ETH TESTNET

        Eth::updateOrCreate([
            'user_id' => 1,
            'address' => Crypt::encryptString('ade9cd3ebdc4ed4d88d853480a9bd66c67f61dca'),
            'public_key' => Crypt::encryptString('04aff3ca36014ba16f155703f0a0a02f35da5d96294b5852204d6ec6765718e98cf636171eb201d04a21bfe01020770bb9f831134f8fc9d8345d6832c6e4256f7a'),
            'private_key' => Crypt::encryptString('4e58151521e6a2ab4cec7a44a2c051a0adb99e372315622b2ce50a52ab3a4605'),
        ]);

        Eth::updateOrCreate([
            'user_id' => 2,
            'address' => Crypt::encryptString('340573eb998c55230ddb61ebf79234ecc40b375a'),
            'public_key' => Crypt::encryptString('040443e966415b6d0df9c73041412d3f21bd6edf971a377386620570c0a6aff1455e7f070da0790be8b20889d193603918854bf6ade8c3a37aea127995d1eaedf8'),
            'private_key' => Crypt::encryptString('b8cd033e9c79cd9f957ede3d8a25b7a76da2b25e72a306486f21057d67f642ff'),
        ]);
        Eth::updateOrCreate([
            'user_id' => 3,
            'address' => Crypt::encryptString('13f2b6b7d4ac91517536c13abb82f9807490b97b'),
            'public_key' => Crypt::encryptString('04e3379bbb87fb4d1ac9d352970ec45753b8ab46b0ffefe1e292444aaf395144c9098b9f768d895e01a2a40d40cdae7c616812fb5c14d553ba897b44a97c2d1490'),
            'private_key' => Crypt::encryptString('6e9e4216e3216490622c21eccaf2f4af140489bf7cd9c27ebd306652f1194012'),
        ]);


        // Reserve Wallet (TESTNET)

        Reserve::updateOrcreate([
           'name' => 'btc',
           'address' => '2NA9P4WojALC7mthakfsKCaZuwEZJCPxTay'
        ]);

        Reserve::updateOrcreate([
            'name' => 'ltc',
            'address' => 'QeopgFQpjo3mWi2fz8YNH2GG8RYmzKtaJw'
        ]);

        Reserve::updateOrcreate([
            'name' => 'doge',
            'address' => '2MxYRZRvSLZuXa6SbYa3KNuMUb8n34qQpvn'
        ]);

        Reserve::updateOrcreate([
            'name' => 'eth',
            'address' => 'ade9cd3ebdc4ed4d88d853480a9bd66c67f61dca',
            'public_key' => '04aff3ca36014ba16f155703f0a0a02f35da5d96294b5852204d6ec6765718e98cf636171eb201d04a21bfe01020770bb9f831134f8fc9d8345d6832c6e4256f7a',
            'private_key' => 'eyJpdiI6IjZwSlVBYW1JeWE5bEs4dnBZTmhnUFE9PSIsInZhbHVlIjoibzNPMXExRVc0ZU9sd0s3MDE1MkNvdC9ORC9zQUVIczMwcS83TU9JTmtVOW4rS24zenM3Vi9EK3FWUnpvdmxXT0kvUm93b2ZlMXlodkNCRUlCWTl0eEJQeU90c05aV
yszYVhsQzZlVUNCMWM9IiwibWFjIjoiYzczZWRhMjVmN2RlMmFiZTE5MDc5MjA1NGNiZjg4NWMwMGUwYTc1NzM3MWQ0OTRmMjNjOGI5N2IzMjU2ZDg1OSJ9'
        ]);




//        Wallet::updateOrCreate([
//            'user_id'       => 1,
//            'btc_address'   => '349RXZDvrBM4JC4SLmYARepVDFzMNTibvY',
//            'ltc_address'   => 'MSVx1mBD6nsGbBoNwptgvqeVCnvENFxhby',
//            'doge_address'  => '9zhe8WgWXxJv7GdrF7vb7PojxMUwJsPu7R',
//            'usd'           => 0,
//            'naira'         => 0
//        ]);
//
//        Wallet::updateOrCreate([
//            'user_id'       => 2,
//            'btc_address'   => '3N4hqVTXWMttALumUE9PquReCafuvFaWTu',
//            'ltc_address'   => 'MUxnJzw7H6DPPxB9nkJY4SLT6QzNJZAhpL',
//            'doge_address'  => '9yeBGkRFSGnCWcx9d9EnksTAAJRvMMGbcm',
//            'usd'           => 0,
//            'naira'         => 0
//        ]);

    }
}
