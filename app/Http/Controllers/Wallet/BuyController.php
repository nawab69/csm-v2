<?php

namespace App\Http\Controllers\Wallet;

use App\Http\Controllers\Controller;
use App\Models\Balance;
use App\Models\Buy;
use App\Models\Currency;
use App\Models\Setting;
use Codenixsv\CoinGeckoApi\CoinGeckoClient;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BuyController extends Controller
{
    public function index()
    {
        $currencies = Currency::where('status',1)->get();

        $buys = Buy::where('user_id',auth()->user()->id)->get();

//        dd($rate);
        return view('buy.index',compact('buys','currencies'));
    }

    public function buy(Request $request)
    {
        $request->validate([
            'from_currency' => 'required',
            'to_currency'   =>  'required',
            'amount'        => 'required'
        ]);

        if($request->amount < 0){
            notify()->error('Invalid Amount', 'Error');
        }

        $balance = Balance::where('user_id',auth()->user()->id)->where('currency_id',$request->from_currency)->first();

        if($request->amount > $balance->balance){
            notify()->error('Insufficient Balance', 'Error');
        }

        $client = new CoinGeckoClient();

        if ($request->to_currency == 'btc') {
            $c1 = 'bitcoin';
        }elseif ($request->to_currency == 'ltc'){
            $c1 = 'litecoin';
        }elseif ($request->to_currency == 'doge'){
            $c1 = 'dogecoin';
        }

        if ($request->from_currency) {
            $c2 = Currency::find($request->from_currency)->code;
        }

        $data = $client->simple()->getPrice($c1, $c2);

        if(isset($data[$c1][$c2])) {
            $transaction_amount =  $request->amount / $data[$c1][$c2] ;
        }else{
            $data = $client->simple()->getPrice($c1, 'usd');
            $transaction_amount =   $request->amount / ($data[$c1]['usd'] * Currency::find($request->from_currency)->default_rate);
        }
        $fee = ($transaction_amount /100) * Setting::get('fee_buy',0);
        $transaction_amount -= $fee;
        $transaction_amount = round($transaction_amount,8,PHP_ROUND_HALF_DOWN);



        Buy::create([
           'trx_id' => Str::orderedUuid(),
           'user_id' => auth()->user()->id,
           'currency_id' => $request->from_currency,
           'to_currency'   => $request->to_currency,
           'amount'        => $request->amount,
           'sell_amount'   => $transaction_amount,
        ]);

        notify()->success('Buy Request Successfull!', 'Success');

        return back();
    }

    public function calculateBuy(Request $request)
    {
        $request->validate([
            'toCurrency'=> 'required',
            'amountTotal' => 'required',
            'fromCurrency' => 'required'
        ]);

        $client = new CoinGeckoClient();

        if ($request->toCurrency == 'btc') {
            $c1 = 'bitcoin';
        }elseif ($request->toCurrency == 'ltc'){
            $c1 = 'litecoin';
        }elseif ($request->toCurrency == 'doge'){
            $c1 = 'dogecoin';
        }

        if ($request->fromCurrency) {
            $c2 = Currency::find($request->fromCurrency)->code;
        }

        $data = $client->simple()->getPrice($c1, $c2);

        if(isset($data[$c1][$c2])) {
            $transaction_amount =  $request->amountTotal / $data[$c1][$c2] ;
        }else{
            $data = $client->simple()->getPrice($c1, 'usd');
            $transaction_amount =   $request->amountTotal / ($data[$c1]['usd'] * Currency::find($request->fromCurrency)->default_rate);
        }
        $fee = ($transaction_amount /100) * Setting::get('fee_buy',0);
        $transaction_amount -= $fee;
        $transaction_amount = round($transaction_amount,8,PHP_ROUND_HALF_DOWN);
        return response()->json(['status' => 'success','amount' => $transaction_amount]);
    }

}
