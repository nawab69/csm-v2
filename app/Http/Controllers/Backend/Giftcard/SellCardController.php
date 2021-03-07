<?php

namespace App\Http\Controllers\Backend\Giftcard;

use App\Http\Controllers\Controller;
use App\Models\Giftcard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class SellCardController extends Controller
{
    public function index()
    {
        Gate::authorize('app.giftcard.index');
        $cards = Giftcard::all();
        return view('backend.giftcard.sell.index',compact('cards'));
    }

    public function create()
    {
        Gate::authorize('app.giftcard.create');
        return view('backend.giftcard.sell.form');
    }

    public function store(Request $request)
    {
        Gate::authorize('app.giftcard.create');
        $card = Giftcard::create([
            'name' => $request->name,
            'usd_rate' => $request->usd_rate,
            'naira_rate' => $request->naira_rate,
            'status'     => $request->filled('status'),
        ]);


        notify()->success('Gift card Successfully Added.', 'Added');
        return redirect()->route('app.giftcard.sell.index');
    }

    public function show(Giftcard $sell)
    {
        Gate::authorize('app.giftcard.index');
        return view('backend.giftcard.sell.show',compact('sell'));
    }

    public function edit(Giftcard $sell)
    {
        Gate::authorize('app.giftcard.index');
        return view('backend.giftcard.sell.form',compact('sell'));
    }

    public function update(Request $request,Giftcard $sell)
    {
        Gate::authorize('app.giftcard.edit');
        $sell->update([
            'name' => $request->name,
            'usd_rate' => $request->usd_rate,
            'naira_rate' => $request->naira_rate,
            'status'     => $request->filled('status'),
        ]);
        notify()->success('Gift Card Successfully Updated.', 'Updated');
        return redirect()->route('app.giftcard.sell.index');
    }

    public function destroy(Giftcard $sell)
    {
        Gate::authorize('app.giftcard.destroy');
        $sell->delete();
        notify()->success("Gift Card Successfully Deleted", "Deleted");
        return back();
    }
}
