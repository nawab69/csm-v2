<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {

        return view('users.index');
    }

    public function update(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
            'avatar' => 'nullable|image'
        ]);
        // Get logged in user
        $user = Auth::user();
        // Update user info
        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'email' => $request->email,
        ]);
        // upload images
        if ($request->hasFile('avatar')) {
            $user->addMedia($request->avatar)->toMediaCollection('avatar');
        }
        // return with success msg
        notify()->success('Profile Successfully Updated.', 'Updated');
        return redirect()->back();
    }

    public function changePassword()
    {
        return view('users.security');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->current_password, $hashedPassword)) {
            if (!Hash::check($request->password, $hashedPassword)) {
                Auth::user()->update([
                    'password' => Hash::make($request->password)
                ]);
                Auth::logout();
                notify()->success('Password Successfully Changed.', 'Success');
                return redirect()->route('login');
            } else {
                notify()->warning('New password cannot be the same as old password.', 'Warning');
            }
        } else {
            notify()->error('Current password not match.', 'Error');
        }
        return redirect()->back();
    }
}
