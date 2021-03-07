<?php

namespace App\Http\Controllers\Wallet;

use App\Classes\BlockIo;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;

class LtcController extends Controller
{
    /**
     * @var BlockIo
     */
    protected $ltc;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->ltc = new BlockIo(setting('ltc_api'),setting('blockio_pin'));
    }

    protected function send($to_address,$amount)
    {
        return $this->ltc->withdraw_from_addresses([
            'from_addresses' => auth()->user()->wallet->ltc_address,
            'to_addresses'   => $to_address,
            'amounts'        => $amount
        ]);
    }

    protected function calculate_fee($to_address,$amount,$uid)
    {
        return $this->ltc->get_network_fee_estimate([
            'from_addresses' => User::find($uid)->wallet->ltc_address,
            'to_addresses'   => $to_address,
            'amounts'        => $amount
        ]);
    }

    public function calculateLtc(Request $request)
    {

        $request->validate([
            'to_address' => 'required|string',
            'amount'     => 'required',
            'uid'       => 'required'
        ]);

        return response()->json($this->calculate_fee($request->to_address,$request->amount,$request->uid));
    }

    public function maxLtc(Request $request)
    {
        $request->validate([
            'to_address' => 'required|string',
            'uid'       => 'required'
        ]);
        $ltc = $this->ltc->get_address_balance(['addresses' => Wallet::where('user_id',$request->uid)->first()->ltc_address])->data->available_balance;
        return response()->json($this->calculate_fee($request->to_address,$ltc,$request->uid));

    }

    public function sendLtc()
    {
        $transactions = $this->showTransactions('sent');
        $balance = $this->ltc->get_address_balance(['addresses' => auth()->user()->wallet->ltc_address])->data->available_balance;
        return view('wallet.ltc.send',compact('balance','transactions'));
    }

    public function sendNow(Request $request)
    {
        $request->validate([
            'to_address' => 'required',
            'amount'     => 'required'
        ]);

        $response =  $this->ltc->withdraw_from_addresses([
            'amounts'     => $request->amount,
            'from_addresses' => auth()->user()->wallet->ltc_address,
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
        $response = $this->ltc->get_transactions([
            'type' => $type,
            'addresses' => auth()->user()->wallet->ltc_address,
        ]);
        if($response->status == 'success'){
            return $response->data->txs;
        };
    }

    public function receiveLtc()
    {
        $address = auth()->user()->wallet->ltc_address;
        $transactions = $this->showTransactions('received');
        return view('wallet.ltc.receive',compact('address','transactions'));
    }
}
