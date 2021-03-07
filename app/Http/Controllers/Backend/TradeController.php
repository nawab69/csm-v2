<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use App\Models\Trade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TradeController extends Controller
{
    public function tradeIndex()
    {
        Gate::authorize('app.dashboard');
        $trades = Trade::with('offer')->paginate(10);

        return view('backend.trade.index',compact('trades'));
    }

    public function disputeTrade()
    {
        Gate::authorize('app.dashboard');
        $trades = Trade::with('offer')->where('status','dispute')->paginate(10);

        return view('backend.trade.index',compact('trades'));
    }

    public function tradePage($trx_id)
    {
        Gate::authorize('app.dashboard');
        $trade = Trade::where('trx_id',$trx_id)->first();
        return view('backend.trade.info',compact('trade'));
    }

    public function offers()
    {
        Gate::authorize('app.dashboard');
        $offers = Offer::all();
        return view('backend.trade.all',compact('offers'));
    }
}
