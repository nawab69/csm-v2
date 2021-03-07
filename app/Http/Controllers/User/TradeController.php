<?php

namespace App\Http\Controllers\User;

use App\Events\MessageSent;
use App\Http\Controllers\Controller;
use App\Models\Currency;
use App\Models\Message;
use App\Models\Method;
use App\Models\Offer;
use App\Models\Trade;
use App\Notifications\BuyOffer;
use App\Notifications\SellOffer;
use App\Notifications\TradeCancelled;
use App\Notifications\TradeCompleted;
use App\Notifications\TradeDispute;
use App\Notifications\TradePaid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class TradeController extends Controller
{
    public function myOffers()
    {
        $offers = Offer::where('user_id',auth()->user()->id)->get();
        return view('offers.my',compact('offers'));
    }

    public function buyOffers(){

        $offers = Offer::where('type','buy')->whereNotIn('user_id',[auth()->user()->id])->get();
        $type = 'buy';
        return view('offers.index',compact('offers','type'));

    }

    public function sellOffers(){

        $offers = Offer::where('type','sell')->whereNotIn('user_id',[auth()->user()->id])->get();
        $type = 'sell';
        return view('offers.index',compact('offers','type'));
    }

    public function create()
    {
        $currencies = Currency::where('status',1)->get();
        $methods   = Method::where('status',1)->get();
        return view('offers.create',compact('currencies','methods'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'currency' => 'required',
            'method'   => 'required',
            'title'   => 'required',
        ]);

        Offer::create([
           'user_id' => Auth::user()->id,
            'type'  => $request->type,
            'currency_id' => $request->currency,
            'method_id'   => $request['method'],
            'title'       => $request->title,
            'extra_info'  => $request->extra_info ?? '',
            'rate'        => $request->rate ?? 1,
            'min'         => $request->min ?? 1,
            'max'         => $request->max ?? 999999,
            'payment_details' => $request->payment_details ?? ''
        ]);

        notify()->success('Offer Created Successfully','Success');
        return back();
    }

    public function edit(Offer $offer)
    {

        if($offer->user_id != auth()->user()->id) {
            abort(403, 'Restricted');
        }else{
            $currencies = Currency::where('status',1)->get();
            $methods   = Method::where('status',1)->get();

        }
        return view('offers.edit',compact('currencies','methods','offer'));
    }

    public function update(Request $request,Offer $offer)
    {
        $request->validate([
            'type' => 'required',
            'currency' => 'required',
            'method'   => 'required',
            'title'   => 'required',
        ]);

        $offer->update([
            'user_id' => Auth::user()->id,
            'type'  => $request->type,
            'currency_id' => $request->currency,
            'method_id'   => $request['method'],
            'title'       => $request->title,
            'extra_info'  => $request->extra_info ?? '',
            'rate'        => $request->rate ?? 1,
            'min'         => $request->min ?? 1,
            'max'         => $request->max ?? 999999,
            'payment_details' => $request->payment_details ?? ''
        ]);

        notify()->success('Offer Updated Successfully','Success!');
        return redirect()->route('offers.my');

    }

    public function destroy(Offer $offer)
    {
        if($offer->user_id === auth()->user()->id){
            $offer->delete();
            notify()->info('Offer Deleted Successfully','Success!');
            return redirect()->route('offers.my');
        }

        abort('403','Restricted');
    }

    public function sellCreate(Offer $offer)
    {
        return view('trade.sell.create',compact('offer'));
    }

    public function buyCreate(Offer $offer)
    {
        return view('trade.buy.create',compact('offer'));
    }

    public function sellStore(Request $request,Offer $offer)
    {
        $request->validate([
            'amount' => 'required',
            'payment_details' => 'nullable'
        ]);

        $fee = ($request->amount /100) * setting('trade_fee',0);
        $total = $request->amount * $offer->rate;
        $seller_balance = auth()->user()->balances()->where('currency_id',$offer->currency_id)->first();
        $buyer_balance = $offer->user->balances()->where('currency_id',$offer->currency_id)->first();

       if( ($total + $fee) <= $seller_balance->balance) {

           $seller_balance->update([
              'balance' =>  $seller_balance->balance - (($total) + ($fee)),
               'escrow' =>  ($seller_balance->escrow) + (($total) + ($fee))
           ]);

           $buyer_balance->update([
               'escrow' =>  ($buyer_balance->escrow) + ($total),
           ]);

           $trade = $offer->trades()->create([
               'seller_id' => auth()->user()->id,
               'buyer_id' => $offer->user_id,
               'trx_id' => Str::orderedUuid(),
               'payment_details' => $request->payment_details ?? '',
               'amount' => $request->amount,
               'fee' => $fee,
               'total' => $total,
           ]);

           $trade->buyer->notify(new SellOffer($trade));

           notify()->success('Trade Has successfully Place','Success!');
           return redirect()->route('trades.sell.info',$trade->trx_id);
       }else{
           notify()->error('Insufficient Balance','Error!');
           return back();
       }
    }

    public function buyStore(Request $request,Offer $offer)
    {
        $request->validate([
            'amount' => 'required',
            'payment_details' => 'nullable'
        ]);

        $fee = ($request->amount /100) * setting('trade_fee',0);
        $total = $request->amount * $offer->rate;
        $buyer_balance = auth()->user()->balances()->where('currency_id',$offer->currency_id)->first();
        $seller_balance = $offer->user->balances()->where('currency_id',$offer->currency_id)->first();

        if( ($total + $fee) <= $seller_balance->balance) {

            $seller_balance->update([
                'balance' =>  $seller_balance->balance - (($total) + ($fee)),
                'escrow' =>  ($seller_balance->escrow) + (($total) + ($fee))
            ]);

            $buyer_balance->update([
                'escrow' =>  ($buyer_balance->escrow) + ($total),
            ]);

            $trade = $offer->trades()->create([
                'buyer_id' => auth()->user()->id,
                'seller_id' => $offer->user_id,
                'trx_id' => Str::orderedUuid(),
                'payment_details' => $request->payment_details ?? '',
                'amount' => $request->amount,
                'fee' => $fee,
                'total' => $total,
            ]);

            $trade->seller->notify(new BuyOffer($trade));
            notify()->success('Trade Has successfully Place','Success!');
            return redirect()->route('trades.buy.info',$trade->trx_id);
        }else{
            notify()->error('Seller has Insufficient Balance','Error!');
            return back();
        }
    }

    public function tradePage($trx_id)
    {
        $trade = Trade::where('trx_id',$trx_id)->first();
        return view('trade.sell.info',compact('trade'));
    }

    public function buyPage($trx_id)
    {
        $trade = Trade::where('trx_id',$trx_id)->first();
        return view('trade.buy.info',compact('trade'));
    }

    public function updateTrade($trx_id,Request $request)
    {
        $trade = Trade::where('trx_id',$trx_id)->first();
        $buyer = $trade->buyer->balances()->where('currency_id',$trade->offer->currency_id)->first();
        $seller = $trade->seller->balances()->where('currency_id',$trade->offer->currency_id)->first();

        if($trade->status == 'waiting' && $request->status=='paid'){
            $trade->update(['status'=> 'paid']);
            $message = Message::create([
                'trade_id' => $trade->id,
                'user_id'  => auth()->user()->id,
                'message'  => 'Trade has been marked as paid !'
            ]);

            $trade->seller->notify(new TradePaid($trade));
            broadcast(new MessageSent(auth()->user(),$message->load('user'),$trade->id))->toOthers();

            notify()->info('successfully mark as paid the trade','success!');
            return back();
        }


        if($trade->status == 'waiting' && $request->status=='cancel'){
            $trade->update(['status'=> 'cancelled']);
            $buyer->update([
                'escrow' => $buyer->escrow - $trade->total,
            ]);
            $seller->update([
                'escrow' => $seller->escrow - (($trade->total)+($trade->fee)),
                'balance' => $seller->balance + (($trade->total)+($trade->fee)),
            ]);

            $message = Message::create([
                'trade_id' => $trade->id,
                'user_id'  => auth()->user()->id,
                'message'  => 'Trade has been cancelled !'
            ]);

            $trade->seller->notify(new TradeCancelled($trade,'seller'));
            $trade->buyer->notify(new TradeCancelled($trade,'buyer'));

            broadcast(new MessageSent(auth()->user(),$message->load('user'),$trade->id))->toOthers();

            notify()->info('successfully cancelled the trade','success!');
            return back();
        }

        if($trade->status == 'dispute' && $request->status=='cancel'){
            $trade->update(['status'=> 'cancelled']);
            $buyer->update([
                'escrow' => $buyer->escrow - $trade->total,
            ]);
            $seller->update([
                'escrow' => $seller->escrow - (($trade->total)+($trade->fee)),
                'balance' => $seller->balance + (($trade->total)+($trade->fee)),
            ]);

            $message = Message::create([
                'trade_id' => $trade->id,
                'user_id'  => auth()->user()->id,
                'message'  => 'Trade has been cancelled !'
            ]);

            $trade->seller->notify(new TradeCancelled($trade,'seller'));
            $trade->buyer->notify(new TradeCancelled($trade,'buyer'));

            broadcast(new MessageSent(auth()->user(),$message->load('user'),$trade->id))->toOthers();

            notify()->info('successfully cancelled the trade','success!');
            return back();
        }

        if($request->status=='complete' && $trade->status!=='cancelled'){
            $trade->update(['status'=> 'completed']);
            $buyer->update([
                'escrow' => $buyer->escrow - $trade->total,
                'balance' => $buyer->balance + $trade->total,
            ]);
            $seller->update([
                'escrow' => $seller->escrow - (($trade->total)+($trade->fee)),
            ]);

            $message = Message::create([
                'trade_id' => $trade->id,
                'user_id'  => auth()->user()->id,
                'message'  => 'Trade has been completed !'
            ]);

            $trade->seller->notify(new TradeCompleted($trade,'seller'));
            $trade->buyer->notify(new TradeCompleted($trade,'buyer'));

            broadcast(new MessageSent(auth()->user(),$message->load('user'),$trade->id))->toOthers();
            notify()->info('successfully completed the trade','Success!');
            return back();
        }

        if ($request->status=='dispute' && $trade->status!=='cancelled'){
            $trade->update(['status'=> 'dispute']);
            $message = Message::create([
                'trade_id' => $trade->id,
                'user_id'  => auth()->user()->id,
                'message'  => 'Trade has been disputed. An admin staff will check this and back to you soon !'
            ]);
            $trade->seller->notify(new TradeDispute($trade,'seller'));
            $trade->buyer->notify(new TradeDispute($trade,'buyer'));
            broadcast(new MessageSent(auth()->user(),$message->load('user'),$trade->id))->toOthers();
            notify()->info('successfully dispute the trade','Success!');
            return back();

        }
    }

    public function tradeIndex()
    {
        $trades = Trade::with('offer')->where('buyer_id',auth()->user()->id)->orWhere('seller_id',auth()->user()->id)->paginate(10);

        return view('trade.index',compact('trades'));
    }



}
