<?php

namespace App\Http\Controllers\Wallet;

use App\Classes\BlockIo;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;

class BtcController extends Controller
{
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
        $this->btc = new BlockIo(setting('btc_api'),setting('blockio_pin'));
    }

    protected function send($to_address,$amount)
    {
        return $this->btc->withdraw_from_addresses([
            'from_addresses' => auth()->user()->wallet->btc_address,
            'to_addresses'   => $to_address,
            'amounts'        => $amount
        ]);
    }

    protected function calculate_fee($to_address,$amount,$uid)
    {
        return $this->btc->get_network_fee_estimate([
            'from_addresses' => User::find($uid)->wallet->btc_address,
            'to_addresses'   => $to_address,
            'amounts'        => $amount
        ]);
    }

    public function calculateBtc(Request $request)
    {

        $request->validate([
           'to_address' => 'required|string',
           'amount'     => 'required',
            'uid'       => 'required',

        ]);

        return response()->json($this->calculate_fee($request->to_address,$request->amount,$request->uid));
    }

    public function maxBtc(Request $request)
    {
        $request->validate([
            'to_address' => 'required|string',
            'uid'       => 'required'
        ]);
        $btc = $this->btc->get_address_balance(['addresses' => Wallet::where('user_id',$request->uid)->first()->btc_address])->data->available_balance;
        return response()->json($this->calculate_fee($request->to_address,$btc,$request->uid));

    }

    public function sendBtc()
    {
        $transactions = $this->showTransactions('sent');
//        dd($transactions);
        $balance = $this->btc->get_address_balance(['addresses' => auth()->user()->wallet->btc_address])->data->available_balance;
        return view('wallet.btc.send',compact('balance','transactions'));
    }

    public function sendNow(Request $request)
    {
        $request->validate([
           'to_address' => 'required',
           'amount'     => 'required'
        ]);

        $response =  $this->btc->withdraw_from_addresses([
            'amounts'     => $request->amount,
            'from_addresses' => auth()->user()->wallet->btc_address,
            'to_addresses' => $request->to_address,
        ]);

        if($response->status == 'success'){
            notify()->success('Transaction Successful', 'Sent');
        }else{
            notify()->error('Transaction Failed','Failed');
        }
        return back();
    }

    protected function showTransactions($type)
    {
        $response = $this->btc->get_transactions([
            'type' => $type,
            'addresses' => auth()->user()->wallet->btc_address,
        ]);
        if($response->status == 'success'){
            return $response->data->txs;
        };
    }

    public function receiveBtc()
    {
        $address = auth()->user()->wallet->btc_address;
        $transactions = $this->showTransactions('received');
        return view('wallet.btc.receive',compact('address','transactions'));
    }
}
