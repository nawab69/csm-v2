<?php

namespace App\Http\Controllers\Backend\Giftcard;

use App\Http\Controllers\Controller;
use App\Models\Giftcardbuy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class BuyCardController extends Controller
{
    public function index()
    {
        Gate::authorize('app.giftcard.index');
        $cards = Giftcardbuy::all();
        return view('backend.giftcard.buy.index',compact('cards'));
    }

    public function create()
    {
        Gate::authorize('app.giftcard.create');
        return view('backend.giftcard.buy.form');
    }

    public function store(Request $request)
    {
        Gate::authorize('app.giftcard.create');
        $card = Giftcardbuy::create([
            'name' => $request->name,
            'usd_rate' => $request->usd_rate,
            'naira_rate' => $request->naira_rate,
            'status'     => $request->filled('status'),
        ]);


        notify()->success('Gift card Successfully Added.', 'Added');
        return redirect()->route('app.giftcard.buy.index');
    }

    public function show(Giftcardbuy $buy)
    {
        Gate::authorize('app.giftcard.index');
        return view('backend.giftcard.buy.show',compact('buy'));
    }

    public function edit(Giftcardbuy $buy)
    {
        Gate::authorize('app.giftcard.edit');
        return view('backend.giftcard.buy.form',compact('buy'));
    }

    public function update(Request $request,Giftcardbuy $buy)
    {
        Gate::authorize('app.giftcard.edit');
        $buy->update([
            'name' => $request->name,
            'usd_rate' => $request->usd_rate,
            'naira_rate' => $request->naira_rate,
            'status'     => $request->filled('status'),
        ]);
        notify()->success('Buy Card Successfully Updated.', 'Updated');
        return redirect()->route('app.giftcard.buy.index');
    }

    public function destroy(Giftcardbuy $buy)
    {
        Gate::authorize('app.giftcard.destroy');
        $buy->delete();
        notify()->success("Buy Card Successfully Deleted", "Deleted");
        return back();
    }


}
