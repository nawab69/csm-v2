<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\TwoFactorController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GuestPageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Twallet\BtcReverseTransferController;
use App\Http\Controllers\Twallet\BtcTransferController;
use App\Http\Controllers\Twallet\DogeReverseTransferController;
use App\Http\Controllers\Twallet\DogeTransferController;
use App\Http\Controllers\Twallet\EthReverseTransferController;
use App\Http\Controllers\Twallet\EthTransferController;
use App\Http\Controllers\Twallet\LtcReverseTransferController;
use App\Http\Controllers\Twallet\LtcTransferController;
use App\Http\Controllers\User\BankController;
use App\Http\Controllers\User\DepositController;
use App\Http\Controllers\User\KycController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\TradeController;
use App\Http\Controllers\User\WithdrawController;
use App\Http\Controllers\Wallet\BtcController;
use App\Http\Controllers\Wallet\BuyController;
use App\Http\Controllers\Wallet\DogeController;
use App\Http\Controllers\Wallet\EthController;
use App\Http\Controllers\Wallet\LtcController;
use App\Http\Controllers\Wallet\NairaController;
use App\Http\Controllers\Wallet\SellController;
use App\Http\Controllers\Wallet\UsdController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('verify/resend', [TwoFactorController::class,'resend'])->name('verify.resend');
Route::resource('verify', TwoFactorController::class)->only(['index', 'store']);

// Guest Pages

Route::get('/',[GuestPageController::class,'index'])->name('welcome');
Route::get('/about-us',[GuestPageController::class,'about'])->name('about');
Route::get('/terms-and-conditions',[GuestPageController::class,'terms'])->name('terms');
Route::view('/services','guest.services')->name('services');
Route::view('/coin','guest.coin')->name('coin');
Route::view('/buy-sell','guest.buy-sell')->name('buysell');
Route::view('/market-data','guest.market')->name('market');
Route::view('/exchange','guest.exchange')->name('exchange');
Route::view('/contact-us','guest.contact')->name('contact');
Route::post('/contact-us',[ContactController::class,'send'])->name('contact.send');
Route::view('/partners','guest.partners')->name('partners');
Route::view('/portfolio','guest.portfolio')->name('portfolio');
Route::view('/history','guest.history')->name('history');
Route::view('/approach','guest.approach')->name('approach');
Route::view('/careers','guest.careers')->name('careers');
Route::view('/testimonials','guest.testimonials')->name('testimonials');
Route::view('/team','guest.team')->name('team');
Route::view('/events','guest.events')->name('events');
Route::view('/privacy-policy','guest.privacy')->name('privacy');
Route::view('/cookie-policy','guest.cookie')->name('cookie');
Route::view('/aml-policy','guest.aml')->name('aml');


// Authentication Routes


Auth::routes();

// Socialite routes
Route::group(['as' => 'login.', 'prefix' => 'login', 'namespace' => 'Auth'], function () {
    Route::get('/{provider}', [LoginController::class, 'redirectToProvider'])->name('provider');
    Route::get('/{provider}/callback', [LoginController::class, 'handleProviderCallback'])->name('callback');
});


// Requires TwoFactor

Route::middleware(['auth','twofactor'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // Transaction Controller

    Route::get('transfer/',[BtcTransferController::class,'index'])->name('transfer');

    // Main wallet to Trade wallet

    // BTC [complete]
    Route::get('transfer/m2t/btc',[BtcTransferController::class,'transferPage'])->name('transfer.btc');
    Route::post('transfer/m2t/btc',[BtcTransferController::class,'check'])->name('transfer.btc.check');
    Route::post('transfer/m2t/btc/send',[BtcTransferController::class,'send'])->name('transfer.btc.send');

    // LTC [complete]
    Route::get('transfer/m2t/ltc',[LtcTransferController::class,'transferPage'])->name('transfer.ltc');
    Route::post('transfer/m2t/ltc',[LtcTransferController::class,'check'])->name('transfer.ltc.check');
    Route::post('transfer/m2t/ltc/send',[LtcTransferController::class,'send'])->name('transfer.ltc.send');

    //DOGE [complete]
    Route::get('transfer/m2t/doge',[DogeTransferController::class,'transferPage'])->name('transfer.doge');
    Route::post('transfer/m2t/doge',[DogeTransferController::class,'check'])->name('transfer.doge.check');
    Route::post('transfer/m2t/doge/send',[DogeTransferController::class,'send'])->name('transfer.doge.send');

    //ETH [complete]

    Route::get('transfer/m2t/eth',[EthTransferController::class,'transferPage'])->name('transfer.eth');
    Route::post('transfer/m2t/eth',[EthTransferController::class,'check'])->name('transfer.eth.check');
    Route::post('transfer/m2t/eth/send',[EthTransferController::class,'send'])->name('transfer.eth.send');

    // Main wallet to Trade wallet


    // BTC [complete]
    Route::get('transfer/t2m/btc',[BtcReverseTransferController::class,'transferPage'])->name('transfer.btc.reverse');
    Route::post('transfer/t2m/btc',[BtcReverseTransferController::class,'check'])->name('transfer.btc.check.reverse');
    Route::post('transfer/t2m/btc/send',[BtcReverseTransferController::class,'send'])->name('transfer.btc.send.reverse');


    // LTC [complete]
    Route::get('transfer/t2m/ltc',[LtcReverseTransferController::class,'transferPage'])->name('transfer.ltc.reverse');
    Route::post('transfer/t2m/ltc',[LtcReverseTransferController::class,'check'])->name('transfer.ltc.check.reverse');
    Route::post('transfer/t2m/ltc/send',[LtcReverseTransferController::class,'send'])->name('transfer.ltc.send.reverse');

    //DOGE [complete]
    Route::get('transfer/t2m/doge',[DogeReverseTransferController::class,'transferPage'])->name('transfer.doge.reverse');
    Route::post('transfer/t2m/doge',[DogeReverseTransferController::class,'check'])->name('transfer.doge.check.reverse');
    Route::post('transfer/t2m/doge/send',[DogeReverseTransferController::class,'send'])->name('transfer.doge.send.reverse');


    //ETH [pending]

    Route::get('transfer/t2m/eth',[EthReverseTransferController::class,'transferPage'])->name('transfer.eth.reverse');
    Route::post('transfer/t2m/eth',[EthReverseTransferController::class,'check'])->name('transfer.eth.check.reverse');
    Route::post('transfer/t2m/eth/send',[EthReverseTransferController::class,'send'])->name('transfer.eth.send.reverse');
















// Bitcoin Transaction

    Route::get('/btc/send', [BtcController::class, 'sendBtc'])->name('btc.send');
    Route::get('/btc/receive', [BtcController::class, 'receiveBtc'])->name('btc.receive');
    Route::post('/btc/send', [BtcController::class, 'sendNow'])->name('btc.send.now');

// Litecoin Transaction

    Route::get('/ltc/send', [LtcController::class, 'sendLtc'])->name('ltc.send');
    Route::get('/ltc/receive', [LtcController::class, 'receiveLtc'])->name('ltc.receive');
    Route::post('/ltc/send', [LtcController::class, 'sendNow'])->name('ltc.send.now');

// Dogecoin Transaction

    Route::get('/doge/send', [DogeController::class, 'sendDoge'])->name('doge.send');
    Route::get('/doge/receive', [DogeController::class, 'receiveDoge'])->name('doge.receive');
    Route::post('/doge/send', [DogeController::class, 'sendNow'])->name('doge.send.now');

    // Eth Transaction
    Route::post('/eth/create', [EthController::class, 'createWallet'])->name('eth.create');
    Route::post('/eth/create/export', [EthController::class, 'downloadKey'])->name('eth.export');
    Route::get('/eth/receive', [EthController::class, 'receiveEth'])->name('eth.receive');
    Route::get('/eth/send', [EthController::class, 'sendEth'])->name('eth.send');
    Route::post('/eth/send', [EthController::class, 'sendNow'])->name('eth.send.now');
    Route::post('/eth/send/sign', [EthController::class, 'sign'])->name('eth.send.sign');
//    Route::get('/eth/send/confirm', [EthController::class, 'signNow'])->name('eth.send.confirm');

//Usd Transaction

    Route::get('/usd/send', [UsdController::class, 'index'])->name('usd.index');
    Route::get('/usd/receive', [UsdController::class, 'receive'])->name('usd.receive');
    Route::post('/usd/send', [UsdController::class, 'send'])->name('usd.send');

// Naira Transaction

    Route::get('/naira/send', [NairaController::class, 'index'])->name('naira.index');
    Route::get('/naira/receive', [NairaController::class, 'receive'])->name('naira.receive');
    Route::post('/naira/send', [NairaController::class, 'send'])->name('naira.send');

// Sell

    Route::get('/sell',[SellController::class,'index'])->name('sell.index');
    Route::post('/sell',[SellController::class,'sell'])->name('sell.sell');

    Route::get('/buy',[BuyController::class,'index'])->name('buy.index');
    Route::post('/buy',[BuyController::class,'buy'])->name('buy.buy');

// Bank
    Route::resource('banks', BankController::class);

// Deposits

    Route::get('deposits',[DepositController::class,'index'])->name('user.deposit.index');
    Route::get('deposits/create/{type}',[DepositController::class,'create'])->name('user.deposit.create');
    Route::get('deposits/{deposit}',[DepositController::class,'show'])->name('user.deposit.show');
    Route::post('deposits',[DepositController::class,'store'])->name('user.deposit.store');
    Route::get('withdraws',[WithdrawController::class,'index'])->name('user.withdraw.index');
    Route::get('withdraws/create/{type}',[WithdrawController::class,'create'])->name('user.withdraw.create');
    Route::get('withdraws/{withdraw}',[WithdrawController::class,'show'])->name('user.withdraw.show');
    Route::post('withdraws',[WithdrawController::class,'store'])->name('user.withdraw.store');

//Giftcard

//    Route::get('giftcards',[GiftcardController::class,'index'])->name('user.giftcard.index');
//
//    Route::get('giftcards/sell',[GiftcardController::class,'sellIndex'])->name('user.giftcard.sell');
//    Route::post('giftcards/sell',[GiftcardController::class,'sellNow'])->name('user.giftcard.sellNow');
//
//    Route::get('giftcards/buy',[GiftcardController::class,'buyIndex'])->name('user.giftcard.buy');
//    Route::post('giftcards/buy',[GiftcardController::class,'buyNow'])->name('user.giftcard.buyNow');

// KYC VERIFICATION

    Route::get('kyc',[KycController::class,'index'])->name('user.kyc.index');
    Route::get('kyc/start-verification',[KycController::class,'kyc'])->name('user.kyc.start');
    Route::post('kyc',[KycController::class,'submit'])->name('user.kyc.submit');

// Profile
    Route::get('profile/', [ProfileController::class, 'index'])->name('users.profile.index');
    Route::post('profile/', [ProfileController::class, 'update'])->name('users.profile.update');

// Security
    Route::get('profile/security', [ProfileController::class, 'changePassword'])->name('users.profile.password.change');
    Route::post('profile/security', [ProfileController::class, 'updatePassword'])->name('users.profile.password.update');
});

// Offers
    Route::get('offers',[TradeController::class,'myOffers'])->name('offers.my');
    Route::get('offers/create',[TradeController::class,'create'])->name('offers.create');
    Route::post('offers',[TradeController::class,'store'])->name('offers.store');
    Route::get('offers/edit/{offer}',[TradeController::class,'edit'])->name('offers.edit');
    Route::PATCH('offers/edit/{offer}',[TradeController::class,'update'])->name('offers.update');
    Route::DELETE('offers/delete/{offer}',[TradeController::class,'destroy'])->name('offers.destroy');


    Route::get('offers/buy',[TradeController::class,'buyOffers'])->name('offers.buy');
    Route::get('offers/sell',[TradeController::class,'sellOffers'])->name('offers.sell');

    Route::get('trade/history',[TradeController::class,'tradeIndex'])->name('trades.index');
    Route::get('trade/sell/{offer}',[TradeController::class,'sellCreate'])->name('trades.sell.offer');
    Route::get('trade/buy/{offer}',[TradeController::class,'buyCreate'])->name('trades.buy.offer');

    Route::post('trade/sell/{offer}',[TradeController::class,'sellStore'])->name('trades.sell.store');
    Route::post('trade/buy/{offer}',[TradeController::class,'buyStore'])->name('trades.buy.store');

    Route::get('trade/sell-info/{trx_id}',[TradeController::class,'tradePage'])->name('trades.sell.info');
    Route::get('trade/buy-info/{trx_id}',[TradeController::class,'buyPage'])->name('trades.buy.info');


    Route::post('trade/sell-info/{trx_id}',[TradeController::class,'updateTrade'])->name('trades.sell.update');

    Route::get('messages/{id}',[MessageController::class,'fetchMessages']);
    Route::post('messages',[MessageController::class,'sendMessage']);
// Pages route e.g. [about,contact,etc]
Route::get('/{slug}', PageController::class)->name('page');




