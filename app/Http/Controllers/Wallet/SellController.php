<?php

namespace App\Http\Controllers\Wallet;

use App\Classes\BlockIo;
use App\Http\Controllers\Controller;
use App\Models\Balance;
use App\Models\Currency;
use App\Models\Sell;
use App\Models\Setting;
use App\Models\User;
use Codenixsv\CoinGeckoApi\CoinGeckoClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class SellController extends Controller
{

    /**
     * @var BlockIo
     */
    protected $btc;
    /**
     * @var BlockIo
     */
    protected $ltc;
    /**
     * @var BlockIo
     */
    protected $doge;

    public function __construct()
    {
        $this->btc = new BlockIo(setting('btc_api'),setting('blockio_pin'));
        $this->ltc = new BlockIo(setting('ltc_api'),setting('blockio_pin'));
        $this->doge = new BlockIo(setting('doge_api'),setting('blockio_pin'));
    }

    public function index()
    {
        $currencies = Currency::where('status',1)->get();
        $sells = Sell::where('user_id',auth()->user()->id)->get();
        return view('sell.index',compact('sells','currencies'));
    }

    public function sell(Request $request)
    {
        $request->validate([
            'currency' => 'required',
            'get_currency' => 'required',
            'amount'   => 'required',
        ]);

        if ($request->currency == 'btc') {

            $result = $this->btc->withdraw_from_addresses([
                'from_addresses' => auth()->user()->wallet->btc_address,
                'to_addresses' => User::find(1)->wallet->btc_address,
                'amounts' => $request->amount,
            ]);
        }else if($request->currency == 'ltc'){
            $result = $this->ltc->withdraw_from_addresses([
                'from_addresses' => auth()->user()->wallet->ltc_address,
                'to_addresses' => User::find(1)->wallet->ltc_address,
                'amounts' => $request->amount,
            ]);
        }else if($request->currency == 'doge'){
            $result = $this->doge->withdraw_from_addresses([
                'from_addresses' => auth()->user()->wallet->doge_address,
                'to_addresses' => User::find(1)->wallet->doge_address,
                'amounts' => $request->amount,
            ]);
        }else{
            notify()->error('Something Went Wrong', 'Error');
            return back();
        }

        if($result->status == 'fail'){
            notify()->error('Insufficient Balance', 'Error');
            return back();
        }

        if($result->status == 'success'){

            $client = new CoinGeckoClient();

            if ($request->currency == 'btc') {
                $c1 = 'bitcoin';
            }elseif ($request->currency == 'ltc'){
                $c1 = 'litecoin';
            }elseif ($request->currency == 'doge'){
                $c1 = 'dogecoin';
            }

            if ($request->get_currency) {
                $c2 = Currency::find($request->get_currency)->code;
            }

                $data = $client->simple()->getPrice($c1, $c2);

            if(isset($data[$c1][$c2])) {
                $transaction_amount = $data[$c1][$c2] * $request->amount;
            }else{
                $data = $client->simple()->getPrice($c1, 'usd');
                $transaction_amount = Currency::find($request->get_currency)->default_rate * $request->amount * $data[$c1]['usd'];
            }

            $fee_sell = Setting::get('fee_sell');
            $fee   = ($transaction_amount / 100 ) * $fee_sell;
            $get_amount = $transaction_amount - $fee;
            $get_amount = round($get_amount, 2, PHP_ROUND_HALF_DOWN);

            if($request->get_currency){
                Sell::create([
                    'trx_id' => Str::orderedUuid(),
                    'user_id' => auth()->user()->id,
                    'from_currency' => $request->currency,
                    'currency_id'   => $request->get_currency,
                    'amount'        => $request->amount,
                    'sell_amount'   => $get_amount
                ]);

                $balance = Balance::where('user_id',auth()->user()->id)->where('currency_id',$request->get_currency)->first();

                $balance->update([
                    'balance' => $balance->balance + $get_amount
                ]);

                notify()->success('Successfully Sold!', 'Success');

            }else{
                notify()->success('Something went wrong. Please contact to customer support!', 'Warning!');
            }

            return back();

        }


    }

    public function calculateSell(Request $request)
    {

        $request->validate([
           'sellCurrency' => 'required',
           'uid'           => 'required',
           'getCurrency'   => 'required',
            'sellAmount'   => 'required',
        ]);

        if ($request->sellCurrency == 'btc') {

            $result = $this->btc->get_network_fee_estimate([
                'from_addresses' => User::find($request->uid)->wallet->btc_address,
                'to_addresses' => User::find(1)->wallet->btc_address,
                'amounts' => $request->sellAmount,
            ]);
        }else if($request->sellCurrency == 'ltc'){
            $result = $this->ltc->get_network_fee_estimate([
                'from_addresses' => User::find($request->uid)->wallet->ltc_address,
                'to_addresses' => User::find(1)->wallet->ltc_address,
                'amounts' => $request->sellAmount,
            ]);
        }else if($request->sellCurrency == 'doge'){
            $result = $this->doge->get_network_fee_estimate([
                'from_addresses' => User::find($request->uid)->wallet->doge_address,
                'to_addresses' => User::find(1)->wallet->doge_address,
                'amounts' => $request->sellAmount,
            ]);
        }else{
            return response()->json(['status' => 'error','message' => 'Something went wrong']);
        }

        if($result->status == 'fail' && isset($result->data->max_withdrawal_available)){
            if ($result->data->max_withdrawal_available == 0){
                return response()->json(['status' => 'error','message' => 'Invalid Amount', 'max_sell' => $result->data->max_withdrawal_available]);
            }
            return response()->json(['status' => 'error','message' => 'You can sell maximum '.$result->data->max_withdrawal_available,'max_sell' => $result->data->max_withdrawal_available]);
        }

        if($result->status == 'success'){

            $client = new CoinGeckoClient();

            if ($request->sellCurrency == 'btc') {
                $c1 = 'bitcoin';
            }elseif ($request->sellCurrency == 'ltc'){
                $c1 = 'litecoin';
            }elseif ($request->sellCurrency == 'doge'){
                $c1 = 'dogecoin';
            }

            if ($request->getCurrency) {
                $c2 = Currency::find($request->getCurrency)->code;
            }

            $data = $client->simple()->getPrice($c1, $c2);

            if(isset($data[$c1][$c2])) {
                $transaction_amount = $data[$c1][$c2] * $request->sellAmount;
            }else{
                $data = $client->simple()->getPrice($c1, 'usd');
                $transaction_amount = Currency::find($request->getCurrency)->default_rate * $request->sellAmount * $data[$c1]['usd'];
            }

            $fee_sell = Setting::get('fee_sell');
            $fee   = ($transaction_amount / 100 ) * $fee_sell;
            $get_amount = $transaction_amount - $fee;
            $get_amount = round($get_amount, 2, PHP_ROUND_HALF_DOWN);
            return response()->json(['status' => 'success','get_amount' => $get_amount]);
        }
    }


}
