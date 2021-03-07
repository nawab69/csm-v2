<?php

namespace App\Http\Controllers;

use App\Notifications\ContactForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class ContactController extends Controller
{
    public function send(Request $request)
    {
       $data =  $request->validate([
            'firstname' => 'required|string',
            'lastname'  =>  'required|string',
            'email'     => 'required',
            'subject'   => 'required',
            'message'   => 'required',
        ]);

        Notification::route('mail',setting('notify_mail'))->notify(new ContactForm($data));
        return 'success';
    }
}
