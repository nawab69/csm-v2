<?php

namespace App\Http\Controllers\Twallet;

use App\Classes\BlockIo;
use App\Http\Controllers\Controller;
use App\Models\Reserve;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class LtcTransferController extends Controller
{
    /**
     * @var BlockIo
     */
    private $ltc;

    public function __construct()
    {
        $this->ltc = new BlockIo(setting('ltc_api'),setting('blockio_pin'));
    }

    public function transferPage()
    {
        $balance = $this->ltc->get_address_balance(['addresses' => auth()->user()->wallet->ltc_address])->data->available_balance ?? 0;
        return view('transfer.m2t.ltc.send',compact('balance'));
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
        $currency = 'ltc';
        $reserve_address = Reserve::where('name','ltc')->first()->address;

        $response = $this->calculate_fee($reserve_address,$amount,$currency);
        $response=collect($response);

        $blockio_fee = $response['data']->blockio_fee;
        $network_fee = $response['data']->estimated_network_fee;

        $fee = $blockio_fee+$network_fee;
        $total = $amount + $fee;

        $session = collect(['total' => $total,'currency' => $currency,'amount' => $amount]);

        Session::put('transfer_ltc',$session);

        if($response['status']=='fail'){
            notify()->warning('Insufficient Balance for Transaction','Error');
            return view('transfer.m2t.ltc.confirm',compact('amount','fee','total'));
        }else{
            return view('transfer.m2t.ltc.confirm',compact('amount','fee','total'));
        }


    }

    public function send(Request $request)
    {

        if(!Session::has('transfer_ltc')){
            notify()->info(' Please Try Again! It may happen if you make duplicate or invalid request to the server!','Session Expired!');
            return redirect()->route('transfer');
        }
        $session = Session::get('transfer_ltc');
        $reserve_address = Reserve::where('name','ltc')->first()->address;
        $response = $this->sendNow($reserve_address,$session['amount'],$session['currency']);

        if(Session::has('transfer_ltc'))
            Session::forget('transfer_ltc');

        if($response){
            notify()->success('Transaction Successful', 'Sent');
            return redirect()->route('transfer');
        }else{
            notify()->error('Transaction Failed','Failed');
            return redirect()->route('transfer');
        }
    }


    protected function calculate_fee($to_address,$amount,$currency)
    {

        return $this->$currency->get_network_fee_estimate([
            'from_addresses' => auth()->user()->wallet[$currency.'_address'],
            'to_addresses'   => $to_address,
            'amounts'        => $amount
        ]);
    }

    protected function sendNow($to_address,$amount,$currency)
    {

        $response = $this->$currency->withdraw_from_addresses([
            'amounts'     => $amount,
            'from_addresses' => auth()->user()->wallet[$currency.'_address'],
            'to_addresses' => $to_address,
        ]);

        if($response->status == 'success'){

            $transaction = Transaction::create(
              [
                  'trx_id' => Str::orderedUuid(),
                  'crypto' => $currency,
                  'type'   => 'trade',
                  'amount' =>  $amount,
                  'status' => 'completed'
              ]
            );

            $tradeBalance = auth()->user()->twallet;
            $tradeBalance->update([
                'main_ltc' => $tradeBalance->main_ltc + $amount,
            ]);


        }else{
            $transaction = null;
        }

        return $transaction;

    }
}
