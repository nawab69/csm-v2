<?php

use App\Http\Controllers\Backend\BackupController;
use App\Http\Controllers\Backend\BuyController;
use App\Http\Controllers\Backend\CurrencyController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\DepositController;
use App\Http\Controllers\Backend\Giftcard\BuyCardController;
use App\Http\Controllers\Backend\Giftcard\BuyOrderController;
use App\Http\Controllers\Backend\Giftcard\SellCardController;
use App\Http\Controllers\Backend\Giftcard\SellOrderController;
use App\Http\Controllers\Backend\KycController;
use App\Http\Controllers\Backend\MenuBuilderController;
use App\Http\Controllers\Backend\MenuController;
use App\Http\Controllers\Backend\MethodController;
use App\Http\Controllers\Backend\PageController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\SellController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\TradeController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\WithdrawController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Roles and Users
Route::resource('roles', RoleController::class)->except(['show']);
Route::resource('users', UserController::class);
Route::group(['as' => 'giftcard.', 'prefix' => 'orders'], function () {

    // Buy Giftcard Order
    Route::get('buys', [BuyOrderController::class,'index'])->name('buys.index');
    Route::get('buys/{order}', [BuyOrderController::class,'show'])->name('buys.show');
    Route::post('buys/process/{order}',[BuyOrderController::class,'process'])->name('buys.process');
    Route::post('buys/comment/{order}',[BuyOrderController::class,'comment'])->name('buys.comment');
    Route::post('buys/complete/{order}',[BuyOrderController::class,'complete'])->name('buys.complete');
    Route::post('buys/cancel/{order}',[BuyOrderController::class,'cancel'])->name('buys.cancel');

    // Sell Giftcard Order
    Route::get('sells', [SellOrderController::class,'index'])->name('sells.index');
    Route::get('sells/{order}', [SellOrderController::class,'show'])->name('sells.show');
    Route::post('sells/process/{order}',[SellOrderController::class,'process'])->name('sells.process');
    Route::post('sells/comment/{order}',[SellOrderController::class,'comment'])->name('sells.comment');
    Route::post('sells/complete/{order}',[SellOrderController::class,'complete'])->name('sells.complete');
    Route::post('sells/cancel/{order}',[SellOrderController::class,'cancel'])->name('sells.cancel');
});
Route::group(['as' => 'giftcard.', 'prefix' => 'giftcard'], function () {
    Route::resource('buy', BuyCardController::class);
    Route::resource('sell', SellCardController::class);

});

// Sell Giftcard Order
Route::get('kycs', [KycController::class,'index'])->name('kycs.index');
Route::get('kycs/{kyc}', [KycController::class,'show'])->name('kycs.show');
Route::post('kycs/approve/{kyc}',[KycController::class,'approve'])->name('kycs.approve');
Route::post('kycs/cancel/{kyc}',[KycController::class,'cancel'])->name('kycs.cancel');
Route::post('kycs/comment/{kyc}',[KycController::class,'comment'])->name('kycs.comment');

// Sells

Route::get('sells', [SellController::class,'index'])->name('sells.index');
Route::get('buys', [BuyController::class,'index'])->name('buys.index');
Route::get('buys/{order}', [BuyController::class,'show'])->name('buys.show');
Route::post('buys/process/{order}',[BuyController::class,'process'])->name('buys.process');
Route::post('buys/complete/{order}',[BuyController::class,'complete'])->name('buys.complete');
Route::post('buys/cancel/{order}',[BuyController::class,'cancel'])->name('buys.cancel');

// Deposits
Route::resource('deposits', DepositController::class)->except(['create','store','edit','update']);
Route::post('deposits/process/{deposit}',[DepositController::class,'process'])->name('deposits.process');
Route::post('deposits/comment/{deposit}',[DepositController::class,'comment'])->name('deposits.comment');
Route::post('deposits/complete/{deposit}',[DepositController::class,'complete'])->name('deposits.complete');
Route::post('deposits/cancel/{deposit}',[DepositController::class,'cancel'])->name('deposits.cancel');




// Withdraw
Route::resource('withdraws', WithdrawController::class)->except(['create','store','edit','update']);
Route::post('withdraws/process/{withdraw}',[WithdrawController::class,'process'])->name('withdraws.process');
Route::post('withdraws/comment/{withdraw}',[WithdrawController::class,'comment'])->name('withdraws.comment');
Route::post('withdraws/complete/{withdraw}',[WithdrawController::class,'complete'])->name('withdraws.complete');
Route::post('withdraws/cancel/{withdraw}',[WithdrawController::class,'cancel'])->name('withdraws.cancel');

// Currency

Route::get('currency',[CurrencyController::class,'index'])->name('currency.index');

//Payment Methods

Route::get('payment-methods',[MethodController::class,'index'])->name('pmethod.index');
Route::get('payment-methods/create',[MethodController::class,'create'])->name('pmethod.create');
Route::post('payment-methods',[MethodController::class,'store'])->name('pmethod.store');
Route::get('payment-method/method/{pmethod}',[MethodController::class,'show'])->name('pmethod.show');
Route::get('payment-method/method/edit/{pmethod}',[MethodController::class,'edit'])->name('pmethod.edit');
Route::patch('payment-methods/method/{pmethod}',[MethodController::class,'update'])->name('pmethod.update');
Route::delete('payment-methods/method/{pmethod}',[MethodController::class,'destroy'])->name('pmethod.delete');

// Trades

Route::get('trades',[TradeController::class,'tradeIndex'])->name('trades.index');
Route::get('dispute-trades',[TradeController::class,'disputeTrade'])->name('trades.dispute');
Route::get('offers',[TradeController::class,'offers'])->name('trades.all');
Route::get('trades/info/{trx_id}',[TradeController::class,'tradePage'])->name('trades.info');



// Backups
Route::resource('backups', BackupController::class)->only(['index', 'store', 'destroy']);
Route::get('backups/{file_name}', [BackupController::class, 'download'])->name('backups.download');
Route::delete('backups', [BackupController::class, 'clean'])->name('backups.clean');

// Profile
Route::get('profile/', [ProfileController::class, 'index'])->name('profile.index');
Route::post('profile/', [ProfileController::class, 'update'])->name('profile.update');

// Security
Route::get('profile/security', [ProfileController::class, 'changePassword'])->name('profile.password.change');
Route::post('profile/security', [ProfileController::class, 'updatePassword'])->name('profile.password.update');

// Pages
Route::resource('pages', PageController::class)->except(['show']);

// Menu Builder
Route::resource('menus', MenuController::class)->except(['show']);
Route::post('menus/{menu}/order', [MenuController::class, 'orderItem'])->name('menus.order');
Route::group(['as' => 'menus.', 'prefix' => 'menus/{id}/'], function () {
    Route::get('builder', [MenuBuilderController::class, 'index'])->name('builder');
    // Menu Item
    Route::group(['as' => 'item.', 'prefix' => 'item'], function () {
        Route::get('/create', [MenuBuilderController::class, 'itemCreate'])->name('create');
        Route::post('/store', [MenuBuilderController::class, 'itemStore'])->name('store');
        Route::get('/{itemId}/edit', [MenuBuilderController::class, 'itemEdit'])->name('edit');
        Route::put('/{itemId}/update', [MenuBuilderController::class, 'itemUpdate'])->name('update');
        Route::delete('/{itemId}/destroy', [MenuBuilderController::class, 'itemDestroy'])->name('destroy');
    });
});

// Settings
Route::group(['as' => 'settings.', 'prefix' => 'settings'], function () {
    Route::get('general', [SettingController::class, 'index'])->name('index');
    Route::patch('general', [SettingController::class, 'update'])->name('update');

    Route::get('appearance', [SettingController::class, 'appearance'])->name('appearance.index');
    Route::patch('appearance', [SettingController::class, 'updateAppearance'])->name('appearance.update');

    Route::get('mail', [SettingController::class, 'mail'])->name('mail.index');
    Route::patch('mail', [SettingController::class, 'updateMailSettings'])->name('mail.update');

    Route::get('socialite', [SettingController::class, 'socialite'])->name('socialite.index');
    Route::patch('socialite', [SettingController::class, 'updateSocialiteSettings'])->name('socialite.update');

    Route::get('blockio', [SettingController::class, 'blockio'])->name('blockio.index');
    Route::patch('blockio', [SettingController::class, 'updateBlockioSettings'])->name('blockio.update');

    Route::get('fee', [SettingController::class, 'fee'])->name('fee.index');
    Route::get('bank', [SettingController::class, 'bank'])->name('bank.index');
    Route::patch('fee', [SettingController::class, 'updateFeeSettings'])->name('fee.update');
});
