<?php

namespace App\Http\Controllers\Backend\Giftcard;

use App\Http\Controllers\Controller;
use App\Models\Sellcard;
use Illuminate\Http\Request;

class SellOrderController extends Controller
{
    public function index()
    {
        $orders = Sellcard ::all();
        return view('backend.giftcard.sells.index',compact('orders'));
    }

    public function show(Sellcard $order)
    {
        return view('backend.giftcard.sells.show',compact('order'));
    }

    public function process(Request $request, Sellcard $order)
    {
        if ($order->status == 'pending') {
            $get_amount = $order->get_amount;
            $currency = $order->currency;

            $escrow = $order->user->escrow->$currency;

            $order->user->escrow->update([
                $currency => $escrow + $get_amount,
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

    public function complete(Request $request, Sellcard $order)
    {

        if ($order->status == 'processing') {
            $get_amount = $order->get_amount;
            $currency = $order->currency;
            $escrow = $order->user->escrow->$currency;
            $wallet = $order->user->wallet->$currency;

            if ($escrow < $get_amount) {
                notify()->error('Insufficient Balance in User escrow.', 'Error');
                return back();
            }
            $order->user->escrow->update([
                $currency => $escrow - $get_amount,
            ]);

            $order->user->wallet->update([
                $currency => $wallet + $get_amount,
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

    public function cancel(Request $request, Sellcard $order)
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

    public function comment(Request $request, Sellcard $order)
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
