<?php

namespace App\Http\Controllers\Wallet;

use App\Classes\BlockIo;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;

class DogeController extends Controller
{

    /**
     * @var BlockIo
     */
    protected $doge;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->doge = new BlockIo(setting('doge_api'),setting('blockio_pin'));
    }

    protected function send($to_address,$amount)
    {
        return $this->doge->withdraw_from_addresses([
            'from_addresses' => auth()->user()->wallet->doge_address,
            'to_addresses'   => $to_address,
            'amounts'        => $amount
        ]);
    }

    protected function calculate_fee($to_address,$amount,$uid)
    {
        return $this->doge->get_network_fee_estimate([
            'from_addresses' => User::find($uid)->wallet->doge_address,
            'to_addresses'   => $to_address,
            'amounts'        => $amount
        ]);
    }

    public function calculateDoge(Request $request)
    {

        $request->validate([
            'to_address' => 'required|string',
            'amount'     => 'required',
            'uid'       => 'required'
        ]);

        return response()->json($this->calculate_fee($request->to_address,$request->amount,$request->uid));
    }

    public function maxDoge(Request $request)
    {
        $request->validate([
            'to_address' => 'required|string',
            'uid'       => 'required'
        ]);
        $doge = $this->doge->get_address_balance(['addresses' => Wallet::where('user_id',$request->uid)->first()->doge_address])->data->available_balance;
        return response()->json($this->calculate_fee($request->to_address,$doge,$request->uid));

    }

    public function sendDoge()
    {
        $transactions = $this->showTransactions('sent');
        $balance = $this->doge->get_address_balance(['addresses' => auth()->user()->wallet->doge_address])->data->available_balance;
        return view('wallet.doge.send',compact('balance','transactions'));
    }

    public function sendNow(Request $request)
    {
        $request->validate([
            'to_address' => 'required',
            'amount'     => 'required'
        ]);

        $response =  $this->doge->withdraw_from_addresses([
            'amounts'     => $request->amount,
            'from_addresses' => auth()->user()->wallet->doge_address,
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
        $response = $this->doge->get_transactions([
            'type' => $type,
            'addresses' => auth()->user()->wallet->doge_address,
        ]);
        if($response->status == 'success'){
            return $response->data->txs;
        };
    }

    public function receiveDoge()
    {
        $address = auth()->user()->wallet->doge_address;
        $transactions = $this->showTransactions('received');
        return view('wallet.doge.receive',compact('address','transactions'));
    }

}
