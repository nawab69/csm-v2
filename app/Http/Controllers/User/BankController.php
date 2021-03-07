<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use Illuminate\Http\Request;

class BankController extends Controller
{
    public function index()
    {
        $banks = Bank::where('user_id',auth()->user()->id)->get();

        return view('bank.index',compact('banks'));
    }

    public function create()
    {
        return view('bank.form');
    }

    public function store(Request $request)
    {

        $request->validate([
            'bank_name' => 'required|string',
            'account_holder' => 'required|string',
            'account_no' => 'required|string',
            'swift_code' => 'required|string',
            'branch_details' => 'required|string',
        ]);

        $bank = Bank::create([
            'user_id' => auth()->user()->id,
            'bank_name' => $request->bank_name,
            'account_holder' => $request->account_holder,
            'account_no' => $request->account_no,
            'swift_code' => $request->swift_code,
            'branch_details' => $request->branch_details,
        ]);

        notify()->success('Bank Added', 'Success');

        return back();
    }

    public function edit(Bank $bank)
    {
        return view('bank.form',compact('bank'));
    }

    public function update(Request $request,Bank $bank)
    {
        $request->validate([
            'bank_name' => 'required|string',
            'account_holder' => 'required|string',
            'account_no' => 'required|string',
            'swift_code' => 'required|string',
            'branch_details' => 'required|string',
        ]);

        $bank->update([
            'user_id' => auth()->user()->id,
            'bank_name' => $request->bank_name,
            'account_holder' => $request->account_holder,
            'account_no' => $request->account_no,
            'swift_code' => $request->swift_code,
            'branch_details' => $request->branch_details,
        ]);
        notify()->success('Bank Updated', 'Success');

        return back();

    }

    public function destroy(Bank $bank)
    {
        $bank->delete();
        notify()->success('Bank Deleted', 'Success');
        return back();
    }



}
