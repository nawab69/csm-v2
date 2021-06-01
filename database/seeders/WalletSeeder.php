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
            'btc_address'   => '2N33hqg4WctsfpK8cNJ6wKZ8ZxJYtGdUNGk',
            'ltc_address'   => 'QYGEKrCPPkkUE8eQCM3FmkUnsHNCiuzZj2',
            'doge_address'  => '2N7QCc2pqpVRmiYjpThuiYro3F8Lm3rHRgo',
            'usd'           => 0,
            'naira'         => 0
        ]);

        Wallet::updateOrCreate([
            'user_id'       => 2,
            'btc_address'   => '2N33hqg4WctsfpK8cNJ6wKZ8ZxJYtGdUNGk',
            'ltc_address'   => 'QW3YdVJVFBvTWtsVKNdqPPVxnByAbYZugC',
            'doge_address'  => '2NFR47ijXUWTWNbxt54X6iMmu7UMchHz4j3',
            'usd'           => 0,
            'naira'         => 0
        ]);


        Twallet::updateOrCreate([
           'user_id' => 1,
        ]);
        Twallet::updateOrCreate([
            'user_id' => 2,
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


        // Reserve Wallet (TESTNET)

        Reserve::updateOrcreate([
           'name' => 'btc',
           'address' => '2N33hqg4WctsfpK8cNJ6wKZ8ZxJYtGdUNGk'
        ]);

        Reserve::updateOrcreate([
            'name' => 'ltc',
            'address' => 'QYGEKrCPPkkUE8eQCM3FmkUnsHNCiuzZj2'
        ]);

        Reserve::updateOrcreate([
            'name' => 'doge',
            'address' => '2N7QCc2pqpVRmiYjpThuiYro3F8Lm3rHRgo'
        ]);

        Reserve::updateOrcreate([
            'name' => 'eth',
            'address' => 'ade9cd3ebdc4ed4d88d853480a9bd66c67f61dca',
            'public_key' => '04aff3ca36014ba16f155703f0a0a02f35da5d96294b5852204d6ec6765718e98cf636171eb201d04a21bfe01020770bb9f831134f8fc9d8345d6832c6e4256f7a',
            'private_key' => 'eyJpdiI6IjZwSlVBYW1JeWE5bEs4dnBZTmhnUFE9PSIsInZhbHVlIjoibzNPMXExRVc0ZU9sd0s3MDE1MkNvdC9ORC9zQUVIczMwcS83TU9JTmtVOW4rS24zenM3Vi9EK3FWUnpvdmxXT0kvUm93b2ZlMXlodkNCRUlCWTl0eEJQeU90c05aV
yszYVhsQzZlVUNCMWM9IiwibWFjIjoiYzczZWRhMjVmN2RlMmFiZTE5MDc5MjA1NGNiZjg4NWMwMGUwYTc1NzM3MWQ0OTRmMjNjOGI5N2IzMjU2ZDg1OSJ9'
        ]);

    }
}
