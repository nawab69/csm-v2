<?php

namespace App\Http\Controllers\Wallet;

use App\Classes\BlockCypher\Crypto\Signer;
use App\Http\Controllers\Controller;
use App\Models\Eth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class EthController extends Controller
{
    public function createWallet(Request $request)
    {
        $eth = auth()->user()->eth;

//        return view('eth.create',['wallet' => $eth]);

        if(!$eth){

            // MAIN NET
            $data = Http::post('https://api.blockcypher.com/v1/eth/main/addrs',[
               'token' => env('BLOCKCHYPER_TOKEN')
            ]);


//            // TEST NET
//            $data = Http::post('https://api.blockcypher.com/v1/beth/test/addrs',[
//                'token' => '6a525a5b207849a9858f884f6623adc7'
//            ]);

            $wallet = Eth::create([
               'user_id' => auth()->user()->id,
               'address' => Crypt::encryptString($data->json('address')),
                'private_key' => Crypt::encryptString($data->json('private')),
                'public_key' => Crypt::encryptString($data->json('public')),
            ]);

            notify()->success('Eth account Created Successfully');

            return view('eth.create',compact('wallet'));
        }
        else{
            notify()->error('You have already a ETH wallet');
            return redirect()->route('home');
        }
    }

    public function downloadKey()
    {
        $eth = auth()->user()->eth;

        $content = "ETH KEY \n";
        $content .= "------------------------------------------------ \n";
        $content .= "------------------------------------------------ \n";
        $content .= "ETH ADDRESS: ";
        $content .= Crypt::decryptString($eth->address);
        $content .= "\n";
        $content .= "PUBLIC KEY: ";
        $content .= Crypt::decryptString($eth->public_key);
        $content .= "\n";
        $content .= "PRIVATE KEY: ";
        $content .= Crypt::decryptString($eth->private_key);
        $content .= "\n";
        $content .= "------------------------------------------------ \n";
        $content .= "------------------------------------------------ \n";
        $content .= "END \n";

        return response($content)
            ->withHeaders([
                'Content-Type' => 'text/plain',
                'Cache-Control' => 'no-store, no-cache',
                'Content-Disposition' => 'attachment; filename="key.txt',
            ]);
    }

    public function receiveEth()
    {

        $address = $this->getAddress();
        $data = Http::get('https://api.blockcypher.com/v1/eth/main/addrs/'.$address);
        $txs = $data->json('txrefs');

        if(!$txs){
            $txs = [];
        }


        return view('wallet.eth.receive',['address' => $address,'transactions'=>$txs]);
    }

    public function sendEth()
    {
        $address = $this->getAddress();

        $data = Http::get('https://api.blockcypher.com/v1/eth/main/addrs/'.$address.'/balance');
        $balance = weiToEth((string)$data->json('final_balance'));

        return view('wallet.eth.send',compact('balance'));
    }

    public function sendNow(Request $request)
    {
        $request->validate([
            'to_address' => 'required',
            'amount'  => 'required',
        ]);

//        dd($request->all());

        $address = $this->getAddress();

        $response = Http::get('https://api.blockcypher.com/v1/eth/main/addrs/'.$address.'/balance');

        $balance = $response->json('balance');

        $balance = weiToEth($balance);

        $response = Http::post('https://api.blockcypher.com/v1/eth/main/txs/new?token='.env('BLOCKCHYPER_TOKEN'),[
            'inputs' =>[ [
                "addresses" => [$address]
            ]],
            'outputs' =>[ [
                "addresses" => [$request->to_address],
                "value"   => ethToWei($request->amount)
            ]],

        ]);

        $res = collect($response->json());

        Session::put('txs', $res);

        return view('wallet.eth.confirm',compact('res','balance'));
    }


    public function sign(Request $request)
    {
        $request->validate([
           'to_sign' => 'required|string'
        ]);
        $key = auth()->user()->eth->private_key;
        $private_key = Crypt::decryptString($key);
        $signature = Signer::sign($request->to_sign,$private_key);
        $res = Session::get('txs');
        if(!$res){
            notify()->error('Please Try again !','Session not found !');
            return redirect()->route('eth.send');
        }
        $res = $res->toArray();
        $res = array_merge($res,["signatures" => [$signature]]);

//        return $res;

        $response = Http::post('https://api.blockcypher.com/v1/eth/main/txs/send?token='.env('BLOCKCHYPER_TOKEN'),$res);

        Session::forget('txs');
        if($response->json('error')){
            notify()->error('Something Went wrong with signing the transaction','Transaction Failed');
            return redirect()->route('eth.send');
        }else{
            notify()->success('Transaction Successful','Completed !');
            return redirect()->route('eth.send');
        }

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
