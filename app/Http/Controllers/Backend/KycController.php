<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Kyc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class KycController extends Controller
{
    public function index()
    {
        Gate::authorize('app.dashboard');
        $kycs = Kyc::where('id_status','submitted')->get();
        return view('backend.kycs.index',compact('kycs'));
    }

    public function show(Kyc $kyc)
    {
        Gate::authorize('app.dashboard');
        return view('backend.kycs.show',compact('kyc'));
    }

    public function approve(Request $request,Kyc $kyc)
    {
        Gate::authorize('app.dashboard');
        if($kyc->id_status == 'submitted'){
            $kyc->update([
                'id_status' => 'approved',
                'address_status' => 'approved',
            ]);
            notify()->success('Kyc Successfully Updated.', 'Updated');
        }else {
            notify()->error('Kyc can not updated.', 'Error');
        }
        return back();
    }

    public function cancel(Request $request, Kyc $kyc)
    {
        Gate::authorize('app.dashboard');
        if($kyc->id_status == 'submitted'){
            $kyc->update([
                'id_status' => 'cancelled',
                'address_status' => 'cancelled',
            ]);
            notify()->success('Kyc Successfully Updated.', 'Updated');
        }else {
            notify()->error('Kyc can not updated.', 'Error');
        }
        return back();
    }

    public function comment(Request $request, Kyc $kyc)
    {
        Gate::authorize('app.dashboard');
        $request->validate([
            'comment' => 'required'
        ]);

        $kyc->update([
            'comment' => $request->comment,
        ]);
        notify()->success('Comment Updated.', 'Updated');
        return back();
    }
}
