<?php

namespace App\Http\Controllers;

use App\Classes\BlockIo;
use App\Models\Activity;
use App\Models\Deposit;
use App\Models\Eth;
use App\Models\Trade;
use App\Models\User;
use App\Models\Wallet;
use App\Models\Withdraw;
use Bezhanov\Ethereum\Converter;
use Codenixsv\CoinGeckoApi\CoinGeckoClient;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    /**
     * @var BlockIo
     */
    protected $doge;
    /**
     * @var BlockIo
     */
    protected $ltc;
    /**
     * @var BlockIo
     */
    protected $btc;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->btc = new BlockIo(setting('btc_api'),setting('blockio_pin'));
        $this->ltc = new BlockIo(setting('ltc_api'),setting('blockio_pin'));
        $this->doge = new BlockIo(setting('doge_api'),setting('blockio_pin'));
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {

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

        $wallet = Wallet::where('user_id',auth()->user()->id)->first();
        $balances = Auth::user()->balances()->with('currency')->get();

        $deposits = $this->depositOrders();
        $withdraws = $this->withdrawOrders();
        $trades = Trade::where('buyer_id',auth()->user()->id)->orWhere('seller_id',auth()->user()->id)->paginate(5);
        $count = $this->countOrders();

        $btc = $this->btc->get_address_balance(['addresses' => auth()->user()->wallet->btc_address])->data;
        $ltc = $this->ltc->get_address_balance(['addresses' => auth()->user()->wallet->ltc_address])->data;
        $doge = $this->doge->get_address_balance(['addresses' => auth()->user()->wallet->doge_address])->data;

        $eth = auth()->user()->eth;

        if($eth){
            $ether = $this->checkEth();
        }else{
            $ether = 0;
        }

        $trade_wallet = auth()->user()->twallet;

        return view('home',compact('btc','ltc','doge','deposits','withdraws','wallet','rate','balances','count','trades','eth','ether','trade_wallet'));
    }



    // All Protected Functions

    protected function depositOrders()
    {
        return auth()->user()->deposits()->paginate(5);
    }

    protected function withdrawOrders()
    {
        return auth()->user()->withdraws()->paginate(5);
    }

    protected function countOrders(){
        $orders = [];
        $orders['pending_trades'] = Trade::where('status','waiting')->where('buyer_id',auth()->user()->id)->orWhere('seller_id',auth()->user()->id)->count();
        $orders['processing_trades'] = Trade::where('status','paid')->where('buyer_id',auth()->user()->id)->orWhere('seller_id',auth()->user()->id)->count();
        $orders['dispute_trades'] = Trade::where('status','dispute')->where('buyer_id',auth()->user()->id)->orWhere('seller_id',auth()->user()->id)->count();
        $orders['pending_deposit'] = Deposit::where('status','pending')->where('user_id',auth()->user()->id)->count();
        $orders['processing_deposit'] = Deposit::where('status','processing')->where('user_id',auth()->user()->id)->count();
        $orders['pending_withdraw'] = Withdraw::where('status','pending')->where('user_id',auth()->user()->id)->count();
        $orders['processing_withdraw'] = Withdraw::where('status','processing')->where('user_id',auth()->user()->id)->count();
        return $orders;
    }

    protected function checkEth(): float
    {
        $address = auth()->user()->eth->address;
        $address = Crypt::decryptString($address);

        $response = Http::get('https://api.blockcypher.com/v1/beth/test/addrs/'.$address.'/balance');

        $balance = $response->json('balance');
        $converter = new Converter();

        $ether = round($converter->fromWei( (string)$balance,'ether'),8,PHP_ROUND_HALF_DOWN);

        return $ether;
    }
}
