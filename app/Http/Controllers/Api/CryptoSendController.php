<?php

namespace App\Http\Controllers\Api;

use App\Classes\BlockIo;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CryptoSendController extends Controller
{
    protected $blockIO;


    public function calculate(Request $request)
    {

        if($request->currency === 'eth'){
            return response()->json(['message' => 'under development']);
        }

        switch ($request->currency) {
            case 'btc':
                $this->blockIO = new BlockIo(setting('btc_api'), setting('blockio_pin'));
                break;
            case 'ltc':
                $this->blockIO = new BlockIo(setting('ltc_api'), setting('blockio_pin'));
                break;
            case 'doge':
                $this->blockIO = new BlockIo(setting('doge_api'), setting('blockio_pin'));
                break;
            default:
                $this->blockIO = null;
        }

        return response()->json($this->calculateBlockIOFee($request->to_address,$request->amount,$request->currency));


    }


    protected function calculateBlockIOFee($to_address,$amount,$currency)
    {
        $user = auth('api')->user();

        if($this->blockIO){
            $response = $this->blockIO->get_network_fee_estimate([
                'from_addresses' => $user->wallet[$currency.'_address'],
                'to_addresses'   => $to_address,
                'amounts'        => $amount
            ]);

            if($response->status === 'success'){
//                $fee = round($response->data->blockio_fee + $response->data->estimated_network_fee,8,PHP_ROUND_HALF_UP);
                return successResponse($response->data);
            }else{
                return errorResponse($response->data);
            }
        }

        return 0;

    }




}
