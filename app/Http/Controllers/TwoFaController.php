<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TwoFaController extends Controller
{
    public function form()
    {
        return view('auth.2fa');
    }

    public function checkCode(Request $request)
    {
        $request->validate([
           'code' => 'required|integer|min:8|max:8'
        ]);

        if(auth()->user()->code == $request->code){
            auth()->user()->update([
                'code' => null
            ]);
        }

        return back();
    }
}
