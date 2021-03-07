<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Withdraw;
use App\Notifications\WithdrawCancelled;
use App\Notifications\WithdrawCompleted;
use App\Notifications\WithdrawProcessing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class WithdrawController extends Controller
{

    public function index()
    {
        Gate::authorize('app.withdraws.index');
        $withdraws = Withdraw::all();
        return view('backend.withdraws.index',compact('withdraws'));
    }

    public function show(Withdraw $withdraw)
    {
        Gate::authorize('app.withdraws.index');
        return view('backend.withdraws.show',compact('withdraw'));
    }

    public function process(Request $request, Withdraw $withdraw)
    {
        Gate::authorize('app.withdraws.edit');
        if($withdraw->status == 'pending'){
            $amount = $withdraw->amount;
            $total = $withdraw->total;
            $currency = $withdraw->currency_id;
            $balance = $withdraw->user->balances()->where('currency_id',$currency)->first();
            $escrow = $balance->escrow;
            $wallet = $balance->balance;

            if($amount > $wallet){
                notify()->error('User has not enough balance in wallet','Error');
                return back();
            }
            $balance->update([
               'escrow' => $escrow + $amount
            ]);
            $balance->update([
               'balance' => $wallet - $total
            ]);
            $withdraw->update([
               'status' => 'processing'
            ]);
            $withdraw->user->notify(new WithdrawProcessing($withdraw));

            notify()->success('Withdraw Successfully Updated.', 'Updated');
        }else{
            notify()->error('Can not be updated while request is not pending','Error');
        }
        return back();
    }

    public function complete(Request $request,Withdraw $withdraw)
    {
        Gate::authorize('app.withdraws.edit');
        if($withdraw->status == 'processing'){
            $amount = $withdraw->amount;
            $currency = $withdraw->currency_id;

            $balance = $withdraw->user->balances()->where('currency_id',$currency)->first();
            $escrow = $balance->escrow;

            if($escrow < $amount){
                notify()->error('Insufficient Balance in User escrow.', 'Error');
            }
            $balance->update([
                'escrow' => $escrow - $amount,
            ]);

            $withdraw->update([
                'status' => 'completed',
            ]);
            $withdraw->user->notify(new WithdrawCompleted($withdraw));
            notify()->success('Withdraw Completed.', 'Completed');
        }else{
            notify()->error('Withdraw can not updated while request is not pending', 'Error');
        }
        return back();
    }

    public function cancel(Request $request ,Withdraw $withdraw)
    {
        Gate::authorize('app.withdraws.destroy');
        $request->validate([
           'comment' => 'required'
        ]);

        $withdraw->update([
           'comment' => $request->comment
        ]);
        $withdraw->user->notify(new WithdrawCancelled($withdraw));
        notify()->success('Withdraw cancelled.', 'Updated');
        return back();
    }

    public function comment(Request $request, Withdraw $withdraw)
    {
        Gate::authorize('app.withdraws.edit');
        $request->validate([
            'comment' => 'required'
        ]);

        $withdraw->update([
            'comment' => $request->comment,
        ]);
        notify()->success('Comment Updated.', 'Updated');
        return back();
    }


}
