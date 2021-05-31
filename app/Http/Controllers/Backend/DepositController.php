<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Notifications\DepositCancelled;
use App\Notifications\DepositCompleted;
use App\Notifications\DepositProcessing;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DepositController extends Controller
{

    public function index()
    {
        Gate::authorize('app.deposits.index');
        $deposits = Deposit::all();
        return view('backend.deposits.index', compact('deposits'));
    }


    public function show(Deposit $deposit)
    {
        Gate::authorize('app.deposits.index');
        return view('backend.deposits.show', compact('deposit'));
    }

    /**
     * @param Request $request
     * @param Deposit $deposit
     * @return RedirectResponse
     * if the deposit request is pending then it will work.
     * It will add the deposit amount to escrow
     */
    public function process(Request $request, Deposit $deposit)
    {
        Gate::authorize('app.deposits.edit');
        if ($deposit->status == 'pending') {
            $amount = $deposit->amount;
            $currency = $deposit->currency_id;
            $balance = $deposit->user->balances()->where('currency_id',$currency)->first();
            $balance->update([
                'escrow' => $balance->escrow + $amount,
            ]);

            $deposit->update([
                'status' => 'processing',
            ]);

            $deposit->user->notify(new DepositProcessing($deposit));

            notify()->success('Deposit Successfully Updated.', 'Updated');

        } else {
            notify()->error('Deposit can not updated.', 'Error');
        }
        return back();
    }


    /**
     * @param Request $request
     * @param Deposit $deposit
     * @return RedirectResponse
     * if the deposit order status processing, then it will work , otherwise fail
     * Remove deposit amount from escrow
     * Add deposit amount to balance
     */
    public function complete(Request $request, Deposit $deposit)
    {
        Gate::authorize('app.deposits.edit');
        if ($deposit->status == 'processing') {
            $amount = $deposit->amount;
            $currency = $deposit->currency_id;
            $balance = $deposit->user->balances()->where('currency_id',$currency)->first();
            $escrow = $balance->escrow;
            $wallet = $balance->balance;
            if ($escrow < $amount) {
                notify()->error('Insufficient Balance in User escrow.', 'Error');
                return back();
            }
            $balance->update([
                'escrow' => $escrow - $amount,
            ]);
            $balance->update([
                'balance' => $wallet + $amount,
            ]);
            $deposit->update([
                'status' => 'completed',
            ]);
            $deposit->user->notify(new DepositCompleted($deposit));
            notify()->success('Deposit Completed.', 'Completed');
        } else {
            notify()->error('Deposit can not updated.', 'Error');
        }
        return back();
    }

    /**
     * @param Request $request
     * @param Deposit $deposit
     * @return RedirectResponse
     * if deposit status is pending then it will work.
     * It will just cancel the deposit.
     */
    public function cancel(Request $request, Deposit $deposit)
    {
        Gate::authorize('app.deposits.destroy');
        if ($deposit->status == 'pending') {

            $deposit->update([
                'status' => 'cancelled',
            ]);
            $deposit->user->notify(new DepositCancelled($deposit));
            notify()->success('Deposit Cancelled.', 'Cancelled');
        } else {
            notify()->error('Deposit can not updated.', 'Error');
        }
        return back();
    }

    /**
     * @param Request $request
     * @param Deposit $deposit
     * @return RedirectResponse
     * add a comment to the deposit order
     */
    public function comment(Request $request, Deposit $deposit)
    {
        Gate::authorize('app.deposits.edit');
        $request->validate([
            'comment' => 'required'
        ]);

        $deposit->update([
            'comment' => $request->comment,
        ]);
        notify()->success('Comment Updated.', 'Updated');
        return back();
    }



}
