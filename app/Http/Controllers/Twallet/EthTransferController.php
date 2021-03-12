<?php

namespace App\Http\Controllers\Twallet;

use App\Classes\BlockCypher\Crypto\Signer;
use App\Classes\BlockIo;
use App\Http\Controllers\Controller;
use App\Models\Reserve;
use App\Models\Transaction;
use App\Models\Twallet;
use Bezhanov\Ethereum\Converter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class EthTransferController extends Controller
{

    public function transferPage()
    {
        $eth = auth()->user()->eth;

        if($eth){
            $balance = $this->checkEth();
        }else{
            $balance = 0;
        }

        return view('transfer.m2t.eth.send',compact('balance'));
    }

    public function check(Request $request)
    {
        $request->validate(
            [
                'amount' => 'required'
            ]
        );

        if($request->amount <= 0){
            notify()->warning('Invalid Amount','Error');
            return back();
        }

        $amount = $request->amount;
        $currency = 'eth';
        $reserve_address = Reserve::where('name','eth')->first()->address;

        $address = $this->getAddress();

        $response = Http::get('https://api.blockcypher.com/v1/eth/main/addrs/'.$address.'/balance');

        $balance = $response->json('balance');

        $balance = weiToEth($balance);

        $response = Http::post('https://api.blockcypher.com/v1/eth/main/txs/new?token='.env('BLOCKCHYPER_TOKEN'),[
            'inputs' =>[ [
                "addresses" => [$address]
            ]],
            'outputs' =>[ [
                "addresses" => [$reserve_address],
                "value"   => ethToWei($amount)
            ]],

        ]);

        $res = collect(['transaction' => $response->json(),'amount' => $amount]);
        Session::put('transfer_eth', $res);
        $fee = $res['transaction']['tx']['fees'] ?? 0 ;
        $total = $res['transaction']['tx']['total'] ?? 0;
        $total += $fee;

        $fee =weiToEth($fee);
        $total = weiToEth($total);

            return view('transfer.m2t.eth.confirm',compact('amount','fee','total'));


    }

    public function send(Request $request)
    {

        if(!Session::has('transfer_eth')){
            notify()->info(' Please Try Again! It may happen if you make duplicate or invalid request to the server!','Session Expired!');
            return redirect()->route('transfer');
        }
        $session = Session::get('transfer_eth');
        $amount = $session['amount'];
        $session = $session['transaction'];
        $response = $this->sendNow($session,$amount);
        if(Session::has('transfer_eth'))
            Session::forget('transfer_eth');
        if(!$response){
            notify()->error('Transaction Failed','Failed');
            return redirect()->route('transfer');
        }else{
            notify()->success('Transaction Successful', 'Sent');
            return redirect()->route('transfer');
        }
    }

    protected function sendNow($session,$amount)
    {
        $tosign = $session['tosign'][0];
        $key = auth()->user()->eth->private_key;
        $private_key = Crypt::decryptString($key);
        $signature = Signer::sign($tosign,$private_key);
        $res = array_merge($session,["signatures" => [$signature]]);
        $response = Http::post('https://api.blockcypher.com/v1/eth/main/txs/send?token='.env('BLOCKCHYPER_TOKEN'),$res);

        if(!$response->json('error')){

            $transaction = Transaction::create(
                [
                    'trx_id' => Str::orderedUuid(),
                    'crypto' => 'eth',
                    'type'   => 'trade',
                    'amount' =>  $amount,
                    'status' => 'completed'
                ]
            );

            $tradeBalance = Twallet::where('user_id',auth()->user()->id)->first();
            $tradeBalance->update([
                'main_eth' => ($tradeBalance->main_eth + ethToWei($amount)),
            ]);
        }else{
            $transaction = null;
        }
        return $transaction;
    }

    protected function checkEth(): float
    {
        $address = auth()->user()->eth->address;
        $address = Crypt::decryptString($address);

        $response = Http::get('https://api.blockcypher.com/v1/eth/main/addrs/'.$address.'/balance');

        $balance = $response->json('balance');

        $converter = new Converter();

        $ether = round($converter->fromWei( (string)$balance),8,PHP_ROUND_HALF_DOWN);

        return $ether;
    }

    protected function getAddress()
    {
        $eth = auth()->user()->eth;
        if(!$eth){
            notify()->warning("You don't have any ETH Wallet. Please Create first","No Wallet Found");
            return redirect()->route('home');
        }

        // Main Net

//        $data = Http::get('https://api.blockcypher.com/v1/eth/main/addrs/'.$eth->address);

//        TEST NET

        return  Crypt::decryptString($eth->address);
    }
}
