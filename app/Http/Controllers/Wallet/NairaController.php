<?php

namespace App\Http\Controllers\Wallet;

use App\Http\Controllers\Controller;
use App\Models\Receive;
use App\Models\Send;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NairaController extends Controller
{
    public function index()
    {
        $fee = Setting::get('fee_send_naira',0) * 1;
        $balance = auth()->user()->wallet->naira;
        $sends = Send::where('user_id',auth()->user()->id)->where('currency','naira')->get();
        return view('wallet.naira.index',compact('balance','fee','sends'));
    }

    public function receive()
    {
        $receives = Receive::where('user_id',auth()->user()->id)->where('currency','naira')->paginate(5);
        return view('wallet.naira.receive',compact('receives'));
    }

    public function send(Request $request)
    {
        $request->validate([
            'to' => 'required|string',
            'amount' => 'required'
        ]);

        $wallet = auth()->user()->wallet;

        if($request->amount < 1){
            notify()->error("can't Transfer less than 1 NAIRA",'Failed');
            return back();
        }
        if($request->amount > $wallet->naira){
            notify()->error("Insufficient Balance",'Failed');
            return back();
        }
        $recipient = User::where('username',$request->to)->first();
        if(!$recipient){
            notify()->error("No user found - '".$request->to."'",'Failed');
            return back();
        }


        $wallet->update([
            'naira' => $wallet->naira - $request->amount
        ]);

        $recipient->wallet->update([
            'naira' => $recipient->wallet->naira + $request->amount
        ]);

        $fee = ( $request->amount /100 ) * Setting::get('fee_send_naira',0);

        $send = Send::create([
            'user_id'  => auth()->user()->id,
            'trx_id'   => $trx = Str::orderedUuid(),
            'currency' => 'naira',
            'amount'   => $request->amount,
            'fee'      =>  $fee ,
            'total'    => $request->amount + $fee,
            'status'   => 'completed'
        ]);

        $receive = Receive::create([
            'user_id' => $recipient->id,
            'trx_id'  =>  $trx,
            'currency' => 'naira',
            'amount'   => $request->amount,
            'note'    => $request->note ?? '',
            'send_id'  => $send->id
        ]);


        notify()->success('Transaction Successful', 'Sent');
        return back();

    }
}
