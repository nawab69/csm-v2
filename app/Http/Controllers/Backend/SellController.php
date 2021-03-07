<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Sell;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class SellController extends Controller
{
    public function index()
    {
        Gate::authorize('app.dashboard');
        $orders = Sell::all();
        return view('backend.sells.index',compact('orders'));
    }

    public function show(Sell $order)
    {
        Gate::authorize('app.dashboard');
        return view('backend.sells.show',compact('order'));
    }
}
