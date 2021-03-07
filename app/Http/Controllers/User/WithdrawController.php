<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\Currency;
use App\Models\PaymentMethod;
use App\Models\Setting;
use App\Models\Withdraw;
use App\Notifications\WithdrawAdmin;
use App\Notifications\WithdrawPending;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;

class WithdrawController extends Controller
{
    public function index()
    {
        $withdraws = Withdraw::where('user_id',auth()->user()->id)->get();

        return view('withdraw.index',compact('withdraws'));

    }

    public function create($type)
    {
        $currency = Currency::where('status',1)->get();
        $payment_methods = PaymentMethod::where('withdraw',1)->get();
        $banks = Bank::where('user_id',auth()->user()->id)->get();
        return view('withdraw.form',compact('banks','currency','payment_methods','type'));
    }

    public function show(Withdraw $withdraw)
    {
        return view('withdraw.show', compact('withdraw'));
    }

    public function store(Request $request)
    {
        $request->validate([
           'currency' => 'required',
           'bank'  => 'nullable',
           'amount'   => 'required',
           'note'     => 'nullable'
        ]);

        $balance = Auth::user()->balances[$request->currency - 1];


        if($request->amount > 0){
            $bal = $balance->balance;

            if($bal < $request->amount){
                notify()->error('Insufficient Balance','Failed');
                return back();
            }
            $fee = ($request->amount / 100) * Setting::get('fee_withdraw_usd',0);
            $total = $request->amount - $fee;

        }else{
            notify()->error('Invalid Currency','Failed');
            return back();
        }

        $withdraw = Withdraw::create([
            'user_id' => auth()->user()->id,
            'trx_id'  => Str::orderedUuid(),
            'bank_id' => $request->bank ?? null,
            'currency_id' => $request->currency,
            'payment_method_id' => $request->payment_method ?? null,
            'amount'  => $request->amount,
            'fee'     => $fee,
            'total'   => $total,
            'note'    => $request->note ?? '',
            'status'  => 'pending',
        ]);

        Notification::route('mail',setting('notify_mail'))
            ->notify(new WithdrawAdmin($withdraw));

        $withdraw->user->notify(new WithdrawPending($withdraw));




        notify()->success('Withdraw Request has been created', 'Success');
        return redirect()->route('user.withdraw.index');
    }


}
