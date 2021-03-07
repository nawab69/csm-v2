<?php

namespace App\Http\Controllers;

use App\Models\Buycard;
use App\Models\Giftcard;
use App\Models\Giftcardbuy;
use App\Models\Sellcard;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class GiftcardController extends Controller
{

    public function index()
    {
        $buys = Buycard::where('user_id',auth()->user()->id)->get();
        $sells = Sellcard::where('user_id',auth()->user()->id)->get();
        return view('giftcard.index',compact('buys','sells'));
    }

    public function sellIndex()
    {
        $cards = Giftcard::where('status',1)->get();
        return view('giftcard.sell',compact('cards'));
    }

    public function sellNow(Request $request)
    {
        $request->validate([
           'card' => 'required',
           'currency' => 'required',
           'amount'   => 'required',
            'note'    => 'nullable',
            'image'   => 'required'
        ]);

        $card = Giftcard::where('id',$request->card)->first();

        if($request->amount < 1){
            notify()->error('Invalid Amount','Error');
            return back();
        }

        if($card && $request->currency == 'usd'){
            $get_amount = $request->amount * $card->usd_rate;
        }else if($card && $request->currency == 'naira'){
            $get_amount = $request->amount * $card->naira_rate;
        }else{
            notify()->error('Invalid Card Selected','Error');
            return back();
        }

        $sell = Sellcard::create([
            'user_id' => auth()->user()->id,
            'trx_id' => Str::orderedUuid(),
            'giftcard_id' => $request->card,
            'currency' => $request->currency,
            'amount'  => $request->amount,
            'get_amount' => $get_amount,
            'note'    => $request->note ?? '',
            'status'  => 'pending'
        ]);

        if ($request->hasFile('image')) {
            $sell->addMedia($request->image)->toMediaCollection('sellcard');
        }

        notify()->success('Sell Order Placed', 'Success');
        return redirect()->route('user.giftcard.index');

    }

    public function buyIndex()
    {
        $cards = Giftcardbuy::where('status',1)->get();
        return view('giftcard.buy',compact('cards'));
    }

    public function buyNow(Request $request)
    {
        $request->validate([
            'card' => 'required',
            'currency' => 'required',
            'amount'   => 'required',
            'note'    => 'nullable'
        ]);

        $card = Giftcardbuy::where('id',$request->card)->first();

        if($request->amount < 1){
            notify()->error('Invalid Amount','Error');
            return back();
        }

        if($card && $request->currency == 'usd'){
            $get_amount = $request->amount * $card->usd_rate;
        }else if($card && $request->currency == 'naira'){
            $get_amount = $request->amount * $card->naira_rate;
        }else{
            notify()->error('Invalid Card Selected','Error');
            return back();
        }

        $buy = Buycard::create([
            'user_id' => auth()->user()->id,
            'trx_id' => Str::orderedUuid(),
            'giftcardbuy_id' => $request->card,
            'currency' => $request->currency,
            'amount'  => $request->amount,
            'get_amount' => $get_amount,
            'note'    => $request->note ?? '',
            'status'  => 'pending'
        ]);

        notify()->success('Buy Order Placed', 'Success');
        return redirect()->route('user.giftcard.index');
    }
}
