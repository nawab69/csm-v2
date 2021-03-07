<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class MethodController extends Controller
{
    public function index()
    {
        Gate::authorize('app.dashboard');
        $pmethods = PaymentMethod::all();
        return view('backend.pmethod.index',compact('pmethods'));
    }

    public function create()
    {
        Gate::authorize('app.dashboard');
        $type = 'create';
        return view('backend.pmethod.form',compact('type'));
    }

    public function edit(PaymentMethod $pmethod)
    {
        Gate::authorize('app.dashboard');
        $type = 'edit';
        return view('backend.pmethod.form',compact('type','pmethod'));
    }

    public function show(PaymentMethod $pmethod)
    {
        Gate::authorize('app.dashboard');
        return view('backend.pmethod.show',compact('pmethod'));
    }

    public function store(Request $request)
    {
        Gate::authorize('app.dashboard');
        $request->validate([
           'name' => 'required',
            'deposit_rate' => 'required',
            'withdraw_rate' => 'required',
            'details'       => 'required',
        ]);

        PaymentMethod::create([
            'name' => $request->name,
            'deposit_rate' => $request->deposit_rate,
            'withdraw_rate' => $request->withdraw_rate,
            'details'       => $request->details,
            'deposit'       => $request->deposit ? 1 : 0,
            'withdraw'       => $request->withdraw ? 1 : 0,
        ]);

        notify()->success('Payment Method Created Successfully','success!');
        return redirect()->route('app.pmethod.index');
    }

    public function update(Request $request,PaymentMethod $pmethod)
    {
        Gate::authorize('app.dashboard');
        $data = $request->validate([
            'name' => 'required',
            'deposit_rate' => 'required',
            'withdraw_rate' => 'required',
            'details'       => 'required',
        ]);
        $pmethod->update([
            'name' => $request->name,
            'deposit_rate' => $request->deposit_rate,
            'withdraw_rate' => $request->withdraw_rate,
            'details'       => $request->details,
            'deposit'       => $request->deposit ? 1 : 0,
            'withdraw'       => $request->withdraw ? 1 : 0,
        ]);

        notify()->success('Payment Method Updated Successfully','success!');
        return redirect()->route('app.pmethod.index');

    }

    public function destroy(Request $request,PaymentMethod $pmethod)
    {
        Gate::authorize('app.dashboard');
        $pmethod->delete();
        notify()->success('Payment Method Deleted Successfully','success!');
        return back();

    }



}
