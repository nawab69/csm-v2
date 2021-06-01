<?php

namespace App\Http\Controllers\Api;

use App\Classes\BlockIo;
use App\Http\Controllers\Controller;
use App\Http\Resources\BalanceResource;
use App\Models\Balance;
use App\Models\Trade;
use App\Models\Twallet;
use App\Models\Wallet;
use Codenixsv\CoinGeckoApi\CoinGeckoClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BalanceController extends Controller
{

    public function getFiatBalance(Request $request)
    {

        try {
            $user = auth('api')->user();
            $twallet = Twallet::where('user_id', $user->id)->first();
            $data['trade_wallet'] = [
                'btc' => $twallet->main_btc ?? 0,
                'ltc' => $twallet->main_ltc ?? 0,
                'doge' => $twallet->main_doge ?? 0,
                'eth' => $twallet->main_doge ?? 0
            ];
            $fiat = BalanceResource::collection(Balance::all());
            $data['fiat_wallet'] = $fiat;
            return successResponse($data);
        }catch(\Exception $e){
            return errorResponse('Something went wrong');
        }
    }

    public function getCryptoBalance(Request $request)
    {
        $user = auth('api')->user();
        $btc = new BlockIo(setting('btc_api'),setting('blockio_pin'));
        $ltc = new BlockIo(setting('ltc_api'),setting('blockio_pin'));
        $doge = new BlockIo(setting('doge_api'),setting('blockio_pin'));

        $client = new CoinGeckoClient();
        $data = $client->simple()->getPrice('bitcoin,litecoin,dogecoin,ethereum', 'usd,ngn,eur,gbp');

        $rate = [
            'btc' => [
                'usd' => $data["bitcoin"]["usd"],
                'naira' => $data["bitcoin"]["ngn"],
                'euro'  => $data["bitcoin"]["eur"],
                'gbp'  => $data["bitcoin"]["gbp"]
            ],
            'ltc' => [
                'usd' => $data["litecoin"]["usd"],
                'naira' => $data["litecoin"]["ngn"],
                'euro'  => $data["litecoin"]["eur"],
                'gbp'  => $data["litecoin"]["gbp"]
            ],
            'doge' => [
                'usd' => $data["dogecoin"]["usd"],
                'naira' => $data["dogecoin"]["ngn"],
                'euro'  => $data["dogecoin"]["eur"],
                'gbp'  => $data["dogecoin"]["gbp"]
            ],
            'eth' => [
                'usd' => $data["ethereum"]["usd"],
                'naira' => $data["ethereum"]["ngn"],
                'euro'  => $data["ethereum"]["eur"],
                'gbp'  => $data["ethereum"]["gbp"]
            ]
        ];

        $wallet = Wallet::where('user_id',auth('api')->user()->id)->first();

        $btc = $btc->get_address_balance(['addresses' => auth('api')->user()->wallet->btc_address])->data;
        $ltc = $ltc->get_address_balance(['addresses' => auth('api')->user()->wallet->ltc_address])->data;
        $doge = $doge->get_address_balance(['addresses' => auth('api')->user()->wallet->doge_address])->data;

        $eth = auth('api')->user()->eth;

        if($eth){
            $ether = $this->checkEth();
        }else{
            $ether = 0;
        }
        return successResponse(['btc'=>$btc,'ltc'=>$ltc,'doge'=>$doge,'eth'=>$eth]);
    }
}
