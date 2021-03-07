<?php

namespace App\Http\Controllers\Backend;

use App\Models\Buycard;
use App\Models\Deposit;
use App\Models\Kyc;
use App\Models\Menu;
use App\Models\Page;
use App\Models\Role;
use App\Models\Sell;
use App\Models\Sellcard;
use App\Models\Trade;
use App\Models\User;
use App\Models\Withdraw;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{

    public function index()
    {
        Gate::authorize('app.dashboard');
        $data['usersCount'] = User::count();
        $data['rolesCount'] = Role::count();
        $data['pagesCount'] = Page::count();
        $data['menusCount'] = Menu::count();
        $data['depositPendingCount'] = Deposit::where('status','pending')->count();
        $data['depositProcessingCount'] = Deposit::where('status','processing')->count();
        $data['depositCancelledCount'] = Deposit::where('status','cancelled')->count();
        $data['depositCompletedCount'] = Deposit::where('status','completed')->count();
        $data['withdrawPendingCount'] = Withdraw::where('status','pending')->count();
        $data['withdrawProcessingCount'] = Withdraw::where('status','processing')->count();
        $data['withdrawCancelledCount'] = Withdraw::where('status','cancelled')->count();
        $data['withdrawCompletedCount'] = Withdraw::where('status','completed')->count();
        $data['sellCount'] = Sell::where('status','success')->count();
        $data['buyPendingCount'] = Sell::where('status','pending')->count();
        $data['buyProcessingCount'] = Sell::where('status','processing')->count();
        $data['buyCompletedCount'] = Sell::where('status','completed')->count();
        $data['buyCancelledCount'] = Sell::where('status','cancelled')->count();
        $data['buyCardPendingCount'] = Buycard::where('status','pending')->count();
        $data['buyCardProcessingCount'] = Buycard::where('status','processing')->count();
        $data['buyCardCompletedCount'] = Buycard::where('status','completed')->count();
        $data['buyCardCancelledCount'] = Buycard::where('status','cancelled')->count();
        $data['sellCardPendingCount'] = Sellcard::where('status','pending')->count();
        $data['sellCardProcessingCount'] = Sellcard::where('status','processing')->count();
        $data['sellCardCompletedCount'] = Sellcard::where('status','completed')->count();
        $data['sellCardCancelledCount'] = Sellcard::where('status','cancelled')->count();
        $data['kycSubmittedCount'] = Kyc::where('id_status','submitted')->count();
        $data['disputeCount'] = Trade::where('status','dispute')->count();

        $data['users'] = User::orderBy('last_login_at','desc')->take(10)->get();
        return view('backend.dashboard', $data);
    }
}
