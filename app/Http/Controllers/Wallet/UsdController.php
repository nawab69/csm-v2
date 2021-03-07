<?php

namespace App\Http\Controllers\Wallet;

use App\Http\Controllers\Controller;
use App\Models\Receive;
use App\Models\Send;
use App\Models\Setting;
use App\Models\User;
use App\Notifications\ReceivedMoney;
use App\Notifications\SendMoney;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class UsdController extends Controller
{

    public function index()
    {
        $fee = Setting::get('fee_send_usd',0) * 1;
        $balance = auth()->user()->balances;
        $sends = Send::where('user_id',auth()->user()->id)->get();
        return view('wallet.usd.index',compact('balance','fee','sends'));
    }

    public function receive()
    {
        $receives = Receive::where('user_id',auth()->user()->id)->paginate(5);
        return view('wallet.usd.receive',compact('receives'));
    }

    public function send(Request $request)
    {
        $request->validate([
            'to' => 'required|string',
            'amount' => 'required',
            'currency' => 'required',
        ]);

        $wallet = auth()->user()->balances()->where('currency_id',$request->currency)->first();

        if($request->amount < 1){
            notify()->error("can't Transfer less than 1 USD",'Failed');
            return back();
        }
        if($request->amount > $wallet->balance){
            notify()->error("Insufficient Balance",'Failed');
            return back();
        }
        $recipient = User::where('username',$request->to)->first();
        if(!$recipient){
            notify()->error("No user found - '".$request->to."'",'Failed');
            return back();
        }
        $rwallet = $recipient->balances()->where('currency_id',$request->currency)->first();


        $fee = ( $request->amount /100 ) * Setting::get('fee_send_usd',0);

        $send = Send::create([
            'user_id'  => auth()->user()->id,
            'trx_id'   => $trx = Str::orderedUuid(),
            'currency_id' => $request->currency,
            'amount'   => $request->amount,
            'fee'      =>  $fee ,
            'total'    => $request->amount - $fee,
            'status'   => 'completed'
        ]);

        $receive = Receive::create([
            'user_id' => $recipient->id,
            'trx_id'  =>  $trx,
            'currency_id' => $request->currency,
            'amount'   => $request->amount - $fee,
            'note'    => $request->note ?? '',
            'send_id'  => $send->id
        ]);


        $wallet->update([
            'balance' => $wallet->balance - $request->amount
        ]);

        $rwallet->update([
           'balance' => $rwallet->balance + ($request->amount - $fee)
        ]);

        $send->user->notify(new SendMoney($send,$receive));
        $receive->user->notify(new ReceivedMoney($send,$receive));

        notify()->success('Transaction Successful', 'Sent');
        return back();

    }
}
