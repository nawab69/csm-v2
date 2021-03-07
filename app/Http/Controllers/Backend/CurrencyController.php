<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CurrencyController extends Controller
{
    public function index()
    {
        Gate::authorize('app.dashboard');
        $currencies = Currency::all();

        return view('backend.currency.index',compact('currencies'));
    }

//    public function create()
//    {
//        return view('backend.currency.create');
//    }
//
//    public function store(Request $request)
//    {
//        $request->validate([
//           'name' => 'required',
//           'code' => 'required',
//            'display' => 'required',
//            'default_rate' => 'required',
//            'status'       => 'required'
//        ]);
//    }
}
