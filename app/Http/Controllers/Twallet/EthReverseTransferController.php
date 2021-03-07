<?php

namespace App\Http\Controllers\Twallet;

use App\Classes\BlockCypher\Crypto\Signer;
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

class EthReverseTransferController extends Controller
{

    public function transferPage()
    {
        $eth = auth()->user()->eth;

        if($eth){
            $balance = auth()->user()->twallet->main_eth;
        }else{
            $balance = 0;
        }

        return view('transfer.t2m.eth.send',compact('balance'));
    }

    public function check(Request $request)
    {
        $request->validate(
            [
                'amount' => 'required'
            ]
        );

        if($request->amount <= 0 || (auth()->user()->twallet->main_eth) <= $request->amount){
            notify()->warning('Insufficient Balance','Error');
            return back();
        }

        $amount = $request->amount;
        $currency = 'eth';


        $reserve_address = Reserve::where('name','eth')->first()->address;



        $address = $this->getAddress();



        $response = Http::get('https://api.blockcypher.com/v1/beth/test/addrs/'.$reserve_address.'/balance');

        $balance = $response->json('balance');

        $balance = weiToEth($balance);



        if($balance > $amount){
            $response = Http::post('https://api.blockcypher.com/v1/beth/test/txs/new?token=6a525a5b207849a9858f884f6623adc7',[
                'inputs' =>[ [
                    "addresses" => [$reserve_address]
                ]],
                'outputs' =>[ [
                    "addresses" => [$address],
                    "value"   => ethToWei($amount)
                ]],

            ]);
            $res = collect(['transaction' => $response->json(),'amount' => $amount]);
            $fee = $res['transaction']['tx']['fees'] ?? 0 ;
            $total = $res['transaction']['tx']['total'] ?? 0;
            $total += $fee;
            $fee =weiToEth($fee);
            $total = weiToEth($total);
            $res->put('total',$total);
            Session::put('transfer_eth_reverse', $res);

            return view('transfer.t2m.eth.confirm',compact('amount','fee','total'));
        }else{
            notify()->error('Something Went Wrong','Error');

            return redirect()->back();
        }






    }



    public function send(Request $request)
    {

        if(!Session::has('transfer_eth_reverse')){
            notify()->info(' Please Try Again! It may happen if you make duplicate or invalid request to the server!','Session Expired!');
            return redirect()->route('transfer');
        }

        $session = Session::get('transfer_eth_reverse');
        $amount = $session['amount'];
        $total = $session['total'];
        $session = $session['transaction'];
        $response = $this->sendNow($session,$amount,$total);

        if(Session::has('transfer_eth_reverse'))
            Session::forget('transfer_eth_reverse');
        if(!$response){
            notify()->error('Transaction Failed','Failed');
            return redirect()->route('transfer');
        }else{
            notify()->success('Transaction Successful', 'Sent');
            return redirect()->route('transfer');
        }
    }

    protected function sendNow($session,$amount,$total)
    {

        if($total > auth()->user()->twallet->main_eth){
            notify()->error('Insufficient Balance or Fee','Error!');
            Session::forget('transfer_eth_reverse');
            return redirect()->back();
        }
        $tosign = $session['tosign'][0];
        $key = Reserve::where('name','eth')->first()->private_key;
        $private_key = Crypt::decryptString($key);
        $signature = Signer::sign($tosign,$private_key);
        $res = array_merge($session,["signatures" => [$signature]]);
        $response = Http::post('https://api.blockcypher.com/v1/beth/test/txs/send?token=6a525a5b207849a9858f884f6623adc7',$res);

        if(!$response->json('error')){

            $transaction = Transaction::create(
                [
                    'trx_id' => Str::orderedUuid(),
                    'crypto' => 'eth',
                    'type'   => 'main',
                    'amount' =>  $total,
                    'status' => 'completed'
                ]
            );

            $tradeBalance = Twallet::where('user_id',auth()->user()->id)->first();

            $tradeBalance->update([
                'main_eth' =>  (ethToWei($tradeBalance->main_eth) - ethToWei($total))
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

        $response = Http::get('https://api.blockcypher.com/v1/beth/test/addrs/'.$address.'/balance');

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
