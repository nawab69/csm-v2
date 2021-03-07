<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use App\Models\Deposit;
use App\Models\PaymentMethod;
use App\Models\User;
use App\Notifications\DepositAdmin;
use App\Notifications\DepositPending;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;

class DepositController extends Controller
{
    public function index()
    {
        $deposits = Deposit::where('user_id',auth()->user()->id)->get();
        return view('deposit.index',compact('deposits'));
    }

    public function create($type)
    {
        $currency = Currency::where('status',1)->get();
        $payment_methods = PaymentMethod::where('deposit',1)->get();
        return view('deposit.form',compact('currency','payment_methods','type'));
    }

    public function show(Deposit $deposit)
    {
        if ($deposit->user_id === auth()->user()->id) {
            return view('deposit.show', compact('deposit'));
        }
        abort(404);
    }

    public function store(Request $request)
    {


        $data = $request->validate([
           'currency' => 'required',
           'amount'  => 'required',
            'bank_name'  => 'nullable|string|max:100',
            'account_holder' => 'nullable|string|max:100',
            'account_no'     => 'nullable|string|max:17',
            'swift_code'  => 'nullable|string|max:20',
            'branch_details' => 'nullable|string|max:255',
            'note' => 'nullable',
            'image'  => 'required|image',
            'payment_method' => 'nullable'
        ]);

        $deposit = Deposit::create([
            'currency_id' => $request->currency,
            'amount'  => $request->amount,
            'bank_name'  => $request->bank_name ?? '',
            'account_holder' => $request->account_holder ?? '',
            'account_no'     => $request->account_no ?? '',
            'swift_code'  => $request->swift_code ?? '',
            'branch_details' => $request->branch_details ?? '',
            'payment_method_id' => $request->payment_method ?? null,
            'note' => $request->note ?? '',
            'status' => 'pending',
            'user_id' => auth()->user()->id,
            'trx_id'  => Str::orderedUuid()
        ]);

        if ($request->hasFile('image')) {
            $deposit->addMedia($request->image)->toMediaCollection('deposit');
        }

        Notification::route('mail',setting('notify_mail'))
                        ->notify(new DepositAdmin($deposit));
        $deposit->user->notify(new DepositPending($deposit));
        notify()->success('Deposit Successful', 'Success');
        return redirect()->route('user.deposit.index');
    }
}
