<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuestPageController extends Controller
{
    public function index()
    {
        return view('guest.index');
    }

    public function about()
    {
        return view('guest.about');
    }

    public function terms()
    {
        return view('guest.terms');
    }


}
