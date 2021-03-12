<?php

namespace App\Http\Controllers\Wallet;

use App\Http\Controllers\Controller;
use App\Models\Balance;
use App\Models\Buy;
use App\Models\Currency;
use App\Models\Setting;
use App\Models\Twallet;
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
        }elseif ($request->to_currency == 'eth'){
            $c1 = 'ethereum';
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
        $fee = round($fee,8,PHP_ROUND_HALF_DOWN);
        $transaction_amount -= $fee;
        $transaction_amount = round($transaction_amount,8,PHP_ROUND_HALF_DOWN);


        $order = Buy::create([
           'trx_id' => Str::orderedUuid(),
           'user_id' => auth()->user()->id,
           'currency_id' => $request->from_currency,
           'to_currency'   => $request->to_currency,
           'amount'        => $request->amount,
           'sell_amount'   => $transaction_amount,
        ]);

        $amount = $order->amount;
        $sellAmount = $order->sell_amount;
        $currency = $order->currency_id;
        $balance = $order->user->balances()->where('currency_id',$currency)->first();

        if($balance->balance > $amount){
            $balance->update([
               'balance' =>  $balance->balance - $amount
            ]);


            $twallet = Twallet::where('user_id',auth()->user()->id)->first();


            $name = 'main_'.$request->to_currency;

            if($request->to_currency != 'eth'){
                $twallet->update([
                    $name => $twallet[$name] + $sellAmount
                ]);
            }else{
                $twallet->update([
                    'main_eth' => ( ethToWei($twallet->main_eth) + ethToWei($sellAmount))
                ]);
            }



            if(addFee($request->to_currency,$fee)){
                $order->update([
                    'status' => 'completed'
                ]);
            }else{
                $order->update([
                    'status' => 'processing'
                ]);
            }

            notify()->success('Buy Request Successfull!', 'Success');
        }else{
            notify()->error('Something went Wrong !','error');
        }

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
        }elseif ($request->toCurrency == 'eth'){
            $c1 = 'ethereum';
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
