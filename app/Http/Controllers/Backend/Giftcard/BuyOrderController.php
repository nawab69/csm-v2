<?php

namespace App\Http\Controllers\Backend\Giftcard;

use App\Http\Controllers\Controller;
use App\Models\Buycard;
use Illuminate\Http\Request;

class BuyOrderController extends Controller
{
    public function index()
    {
        $orders = Buycard::all();
        return view('backend.giftcard.buys.index',compact('orders'));
    }

    public function show(Buycard $order)
    {
        return view('backend.giftcard.buys.show',compact('order'));
    }

    public function process(Request $request, Buycard $order)
    {
        if ($order->status == 'pending') {
            $amount = $order->amount;
            $get_amount = $order->get_amount;
            $currency = $order->currency;

            $escrow = $order->user->escrow->$currency;
            $wallet = $order->user->wallet->$currency;

            if($wallet < $get_amount){
                notify()->error('User has Insufficient Balance!', 'Error');
                return back();
            }

            $order->user->escrow->update([
                $currency => $escrow + $amount,
            ]);

            $order->user->wallet->update([
                $currency => $wallet - $get_amount,
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

    public function complete(Request $request, Buycard $order)
    {

        if ($order->status == 'processing') {
            $amount = $order->amount;
            $currency = $order->currency;
            $escrow = $order->user->escrow->$currency;

            if ($escrow < $amount) {
                notify()->error('Insufficient Balance in User escrow.', 'Error');
            }
            $order->user->escrow->update([
                $currency => $escrow - $amount,
            ]);

            $order->update([
                'status' => 'completed',
            ]);

            notify()->success('Order Completed.', 'Completed');
        } else {
            notify()->error('Order can not updated.', 'Error');
        }
        return back();
    }

    public function cancel(Request $request, Buycard $order)
    {
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

    public function comment(Request $request, Buycard $order)
    {
        $request->validate([
            'comment' => 'required'
        ]);

        $order->update([
            'comment' => $request->comment,
        ]);
        notify()->success('Comment Updated.', 'Updated');
        return back();
    }




}
