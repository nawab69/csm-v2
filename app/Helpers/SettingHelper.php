<?php

use Bezhanov\Ethereum\Converter;

if (!function_exists('setting')) {

    /**
     * Get setting value by key.
     *
     * @param $key
     * @param $default
     *
     * @return string
     */
    function setting($key, $default=null)
    {
        return \App\Models\Setting::get($key, $default);
    }
}

if (!function_exists('getBalance')) {


    function getBalance($user_id,$currency_id=1)
    {
        return \App\Models\Balance::where('user_id',$user_id)->where('currency_id',$currency_id)->first()->balance;
    }
}

//if (!function_exists('addActivity')) {
//
//
//    function addActivity($user_id,$details)
//    {
//        return \App\Models\Activity::create([
//            'user_id' => $user_id,
//            'details' => $details
//        ]);
//    }
//}

if (!function_exists('weiToEth')) {


    function weiToEth($value)
    {
        $converter = new Converter();
         return round($converter->fromWei($value),8,PHP_ROUND_HALF_DOWN);
    }
}


if (!function_exists('ethToWei')) {


    function ethToWei(string $value): int
    {
        $converter = new Converter();
         return $converter->toWei($value);
    }
}

if (!function_exists('addFee')) {


    function addFee($coin,$fee)
    {

       $feeModel = \App\Models\Charge::where('coin',$coin)->first();


       $add  = (double) $feeModel->value +  $fee;

       $feeModel->update([
           'value' => $add
       ]);

       return true;
    }
}

