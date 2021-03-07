<?php

namespace App\Http\Controllers\Wallet;

use App\Classes\BlockIo;
use App\Http\Controllers\Controller;
use App\Models\Balance;
use App\Models\Currency;
use App\Models\Sell;
use App\Models\Setting;
use App\Models\Twallet;
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

        $twallet = Twallet::where('user_id',auth()->user()->id)->first();


        if($request->amount < 0 || $request->amount > $twallet['main_'.$request->currency]) {
            notify()->error('Insufficient Balance');
            return redirect()->back();
        }

        $fee_sell = Setting::get('fee_sell');

        $fee = ($request->amount /100) * $fee_sell;
        $sellAmount = ($request->amount - $fee);
        $client = new CoinGeckoClient();

        if ($request->currency == 'btc') {
            $c1 = 'bitcoin';
        }elseif ($request->currency == 'ltc'){
            $c1 = 'litecoin';
        }elseif ($request->currency == 'doge'){
            $c1 = 'dogecoin';
        }elseif ($request->currency == 'eth') {
            $c1 = 'ethereum';
        }

        if ($request->get_currency) {
            $c2 = Currency::find($request->get_currency)->code;
        }

        $data = $client->simple()->getPrice($c1, $c2);


        if(isset($data[$c1][$c2])) {
            $transaction_amount = $data[$c1][$c2] * $sellAmount;
        }else{
            $data = $client->simple()->getPrice($c1, 'usd');
            $transaction_amount = Currency::find($request->get_currency)->default_rate * $sellAmount * $data[$c1]['usd'];
        }

        $fee = round($fee,8,PHP_ROUND_HALF_UP);
        $get_amount = round($transaction_amount, 2, PHP_ROUND_HALF_DOWN);

        $name = 'main_'.$request->currency;


        if($request->currency != 'eth'){
            $twallet->update([
                $name => $twallet[$name] - $request->amount
            ]);
        }else{
            $twallet->update([
                'main_eth' => (ethToWei($request->amount) + $twallet->main_eth)
            ]);
        }

        $currencyId = Currency::find($request->get_currency)->id;

        $fiat_balance = auth()->user()->balances()->where('currency_id',$currencyId)->first();

        $fiat_balance->update([
            'balance' => ($fiat_balance->balance+$get_amount)
        ]);

        Sell::create([
            'trx_id' => Str::orderedUuid(),
            'user_id' => auth()->user()->id,
            'from_currency' => $request->currency,
            'currency_id' => $currencyId,
            'sell_amount' => $get_amount,
            'amount' => $request->amount
        ]);



        notify()->success('Successfully Sold!', 'Success');
        return back();
    }

    public function calculateSell(Request $request)
    {

            $request->validate([
               'sellCurrency' => 'required',
               'uid'           => 'required',
               'getCurrency'   => 'required',
                'sellAmount'   => 'required',
            ]);

            $fee_sell = Setting::get('fee_sell');
            $fee = ($request->sellAmount /100) * $fee_sell;
            $sellAmount = ($request->sellAmount - $fee);

            $client = new CoinGeckoClient();

            if ($request->sellCurrency == 'btc') {
                $c1 = 'bitcoin';
            }elseif ($request->sellCurrency == 'ltc'){
                $c1 = 'litecoin';
            }elseif ($request->sellCurrency == 'doge'){
                $c1 = 'dogecoin';
            }elseif ($request->sellCurrency == 'eth') {
                $c1 = 'ethereum';
            }

            if ($request->getCurrency) {
                $c2 = Currency::find($request->getCurrency)->code;
            }

            $data = $client->simple()->getPrice($c1, $c2);


            if(isset($data[$c1][$c2])) {
                $transaction_amount = $data[$c1][$c2] * $sellAmount;
            }else{
                $data = $client->simple()->getPrice($c1, 'usd');
                $transaction_amount = Currency::find($request->getCurrency)->default_rate * $sellAmount * $data[$c1]['usd'];
            }

            $fee = round($fee,8,PHP_ROUND_HALF_UP);
            $get_amount = round($transaction_amount, 2, PHP_ROUND_HALF_DOWN);
            return response()->json(['status' => 'success','get_amount' => $get_amount,'fee' => $fee]);
        }
    }
