<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Kyc;
use Illuminate\Http\Request;

class KycController extends Controller
{
    public function index()
    {
        $kyc = Kyc::where('user_id',auth()->user()->id)->first();
        return view('kyc.index',compact('kyc'));
    }

    public function kyc()
    {
        $kyc = Kyc::where('user_id',auth()->user()->id)->first();
        return view('kyc.form',compact('kyc'));
    }

    public function submit(Request $request)
    {
        $request->validate([
            'nid_no' => 'required',
            'id_front' => 'required',
            'id_back'  => 'required',
            'address_1' => 'required',
            'address_2' => 'nullable',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'postcode' => 'required',
            'address_document' => 'required',
        ]);
        $id_front = '';
        $id_back = '';
        $address_document = '';

        if($request->has('id_front')){
            $random_string = md5(microtime());
            $file = $request->file('id_front');
            if($file->getClientOriginalExtension() === 'jpg' || $file->getClientOriginalExtension() === 'png' || $file->getClientOriginalExtension() === 'jpeg' || $file->getClientOriginalExtension() === 'JPG' || $file->getClientOriginalExtension() === 'JPEG' || $file->getClientOriginalExtension() === 'PNG' || $file->getClientOriginalExtension() === 'pdf' ) {
                $name = $random_string . '.' . $file->getClientOriginalExtension();
                $file->storeAs(
                    'public/kyc', $name
                );
                $id_front = $name;
            }else{
                notify()->error('Invalid Image Format', 'Error');
                return back();
            }
        }
        if($request->has('id_back')){
            $random_string = md5(microtime());
            $file = $request->file('id_back');
            if($file->getClientOriginalExtension() === 'jpg' || $file->getClientOriginalExtension() === 'png' || $file->getClientOriginalExtension() === 'jpeg' || $file->getClientOriginalExtension() === 'JPG' || $file->getClientOriginalExtension() === 'JPEG' || $file->getClientOriginalExtension() === 'PNG' || $file->getClientOriginalExtension() === 'pdf' ) {
                $name = $random_string . '.' . $file->getClientOriginalExtension();
                $file->storeAs(
                    'public/kyc', $name
                );
                $id_back = $name;
            }else{
                notify()->error('Invalid Image Format', 'Error');
                return back();
            }
        }
        if($request->has('address_document')){
            $random_string = md5(microtime());
            $file = $request->file('address_document');
            if($file->getClientOriginalExtension() === 'jpg' || $file->getClientOriginalExtension() === 'png' || $file->getClientOriginalExtension() === 'jpeg' || $file->getClientOriginalExtension() === 'JPG' || $file->getClientOriginalExtension() === 'JPEG' || $file->getClientOriginalExtension() === 'PNG' || $file->getClientOriginalExtension() === 'pdf' ) {
                $name = $random_string . '.' . $file->getClientOriginalExtension();
                $file->storeAs(
                    'public/kyc', $name
                );
                $address_document = $name;
            }else{
                notify()->error('Invalid Image Format', 'Error');
                return back();
            }
        }

        auth()->user()->kyc->update([
            'nid_no' => $request->nid_no,
            'id_front' => $id_front,
            'id_back'  => $id_back,
            'address_document' => $address_document,
            'address_1' => $request->address_1,
            'address_2' => $request->address_2,
            'city'      => $request->city,
            'state'     => $request->state,
            'postcode' => $request->postcode,
            'country'   => $request->country,
            'id_status' => 'submitted',
            'address_status' => 'submitted'
        ]);

        notify()->success('Document Submitted', 'Success');
        return redirect()->route('user.kyc.index');
    }
}
