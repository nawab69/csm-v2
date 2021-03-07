<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Buy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class BuyController extends Controller
{
    public function index()
    {
        Gate::authorize('app.dashboard');
        $orders = Buy::all();
        return view('backend.buys.index',compact('orders'));
    }

    public function show(Buy $order)
    {
        Gate::authorize('app.dashboard');
        return view('backend.buys.show',compact('order'));
    }

    public function process(Request $request, Buy $order)
    {
        Gate::authorize('app.dashboard');
        if ($order->status == 'pending') {
            $amount = $order->amount;
            $currency = $order->currency_id;
            $balance = $order->user->balances()->where('currency_id',$currency)->first();


            if($balance->balance < $amount){
                notify()->error('User has Insufficient Balance!', 'Error');
                return back();
            }

            $balance->update([
                'escrow' => $balance->escrow + $amount,
                'balance' => $balance->balance -$amount
            ]);


            $order->update([
                'status' => 'processing',
            ]);

            notify()->success('Order Successfully Updated.', 'Updated');
        } else {
            notify()->error('Order can not updated.', 'Error');
        }
        return back();
    }

    public function complete(Request $request, Buy $order)
    {
        Gate::authorize('app.dashboard');

        if ($order->status == 'processing') {
            $amount = $order->amount;
            $currency = $order->currency_id;
            $balance = $order->user->balances()->where('currency_id',$currency)->first();

            if ($balance->escrow < $amount) {
                notify()->error('Insufficient Balance in User escrow.', 'Error');
            }else{
                $balance->update([
                    'escrow' => $balance->escrow - $amount,
                ]);
                $order->update([
                    'status' => 'completed',
                ]);
                notify()->success('Order Completed.', 'Completed');
            }
        } else {
            notify()->error('Order can not updated.', 'Error');
        }
        return back();
    }

    public function cancel(Request $request, Buy $order)
    {
        Gate::authorize('app.dashboard');
        if ($order->status == 'pending') {

            $order->update([
                'status' => 'cancelled',
            ]);
            notify()->success('Order Cancelled.', 'Cancelled');
        } else {
            notify()->error('Order can not updated.', 'Error');
        }
        return back();
    }

}
