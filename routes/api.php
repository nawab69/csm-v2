<?php

use Illuminate\Support\Facades\Route;

Route::post('btc/calculate',[\App\Http\Controllers\Wallet\BtcController::class,'calculateBtc']);
Route::post('btc/max',[\App\Http\Controllers\Wallet\BtcController::class,'maxBtc']);

Route::post('ltc/calculate',[\App\Http\Controllers\Wallet\LtcController::class,'calculateLtc']);
Route::post('ltc/max',[\App\Http\Controllers\Wallet\LtcController::class,'maxLtc']);

Route::post('doge/calculate',[\App\Http\Controllers\Wallet\DogeController::class,'calculateDoge']);
Route::post('doge/max',[\App\Http\Controllers\Wallet\DogeController::class,'maxDoge']);
Route::post('calculate-sell',[\App\Http\Controllers\Wallet\SellController::class,'calculateSell']);
Route::post('calculate-buy',[\App\Http\Controllers\Wallet\BuyController::class,'calculateBuy']);
