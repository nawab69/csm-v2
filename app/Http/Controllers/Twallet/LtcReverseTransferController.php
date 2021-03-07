<?php

namespace App\Http\Controllers\Twallet;

use App\Classes\BlockIo;
use App\Http\Controllers\Controller;
use App\Models\Reserve;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class LtcReverseTransferController extends Controller
{
    /**
     * @var BlockIo
     */
    protected $ltc;

    public function __construct()
    {
        $this->ltc = new BlockIo(setting('ltc_api'),setting('blockio_pin'));
    }


    public function transferPage()
    {
        $balance = auth()->user()->twallet->main_ltc;
        return view('transfer.t2m.ltc.send',compact('balance'));
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

        if($amount >= auth()->user()->twallet->main_ltc){

            notify()->error('Insufficient Amount','Error!');
            return redirect()->back();

        }

        $currency = 'ltc';


        $reserve_address = Reserve::where('name','ltc')->first()->address;

        $response = $this->calculate_fee($reserve_address,$amount,$currency);
        $response=collect($response);

        $blockio_fee = $response['data']->blockio_fee;
        $network_fee = $response['data']->estimated_network_fee;

        $fee = $blockio_fee+$network_fee;
        $total = $amount + $fee;

        if($total > auth()->user()->twallet->main_ltc){
            notify()->warning('Insufficient Balance','Error');
            return redirect('transfer');
        }

        $session = collect(['total' => $total,'currency' => $currency,'amount'=> $amount]);

        Session::put('transferReverse',$session);

        if($response['status']=='fail'){
            notify()->warning('Something Went Wrong','Error');
            return redirect('transfer');
        }else{
            return view('transfer.t2m.ltc.confirm',compact('amount','fee','total'));
        }


    }

    public function send(Request $request)
    {
        if(!Session::has('transferReverse')){
            notify()->info(' Please Try Again! It may happen if you make duplicate or invalid request to the server!','Session Expired!');
            return redirect()->route('transfer');
        }
        $session = Session::get('transferReverse');
        $reserve_address = Reserve::where('name','ltc')->first()->address;
        $response = $this->sendNow($reserve_address,$session['amount'],$session['currency']);

        if(Session::has('transferReverse'))
            Session::forget('transfer');

        if($response){
            notify()->success('Transaction Successful', 'Sent');
            return redirect()->route('transfer');
        }else{
            notify()->error('Transaction Failed','Failed');
            return redirect()->route('transfer');
        }
    }


    protected function calculate_fee($from_address,$amount,$currency)
    {

        return $this->$currency->get_network_fee_estimate([
            'from_addresses' => $from_address,
            'to_addresses'   => auth()->user()->wallet[$currency.'_address'],
            'amounts'        => $amount
        ]);
    }

    protected function sendNow($from_address,$amount,$currency)
    {

        $response = $this->$currency->withdraw_from_addresses([
            'amounts'     => $amount,
            'from_addresses' => $from_address,
            'to_addresses' => auth()->user()->wallet[$currency.'_address'],
        ]);



        if($response->status == 'success'){

            $transaction = Transaction::create(
              [
                  'trx_id' => Str::orderedUuid(),
                  'crypto' => $currency,
                  'type'   => 'main',
                  'amount' =>  $response->data->amount_withdrawn,
                  'status' => 'completed'
              ]
            );

            $tradeBalance = auth()->user()->twallet;

            $tradeBalance->update([
               'main_ltc' => $tradeBalance->main_ltc - $response->data->amount_withdrawn,
            ]);
        }else{
            $transaction = null;
        }

        return $transaction;

    }
}
