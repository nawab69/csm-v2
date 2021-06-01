<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Route;

Route::post('btc/calculate',[\App\Http\Controllers\Wallet\BtcController::class,'calculateBtc']);
Route::post('btc/max',[\App\Http\Controllers\Wallet\BtcController::class,'maxBtc']);

Route::post('ltc/calculate',[\App\Http\Controllers\Wallet\LtcController::class,'calculateLtc']);
Route::post('ltc/max',[\App\Http\Controllers\Wallet\LtcController::class,'maxLtc']);

Route::post('doge/calculate',[\App\Http\Controllers\Wallet\DogeController::class,'calculateDoge']);
Route::post('doge/max',[\App\Http\Controllers\Wallet\DogeController::class,'maxDoge']);
Route::post('calculate-sell',[\App\Http\Controllers\Wallet\SellController::class,'calculateSell']);
Route::post('calculate-buy',[\App\Http\Controllers\Wallet\BuyController::class,'calculateBuy']);


Route::group([

    'middleware' => 'api',
    'namespace' => 'App\Http\Controllers',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', [AuthController::class,'login']);
    Route::post('logout', [AuthController::class,'logout']);
    Route::post('refresh', [AuthController::class,'refresh']);
    Route::post('me', [AuthController::class,'me']);



});

Route::group([
    'middleware' => 'auth:api',
    'namespace' => 'App\Http\Controllers',
], function ($router){
    Route::get('balances/fiat',[\App\Http\Controllers\Api\BalanceController::class,'getFiatBalance']);
    Route::get('balances/crypto',[\App\Http\Controllers\Api\BalanceController::class,'getCryptoBalance']);
});
