<?php

namespace App\Classes\BlockCypher\Crypto;

use BitWasp\Bitcoin\Bitcoin;
use BitWasp\Bitcoin\Crypto\Random\Rfc6979;
use BitWasp\Buffertools\Buffer;


/**
 * Class Signer
 * @package BlockCypher\Crypto
 */
class Signer
{



    public static function sign($hexDataToSign, $privateKey)
    {
        if (is_string($privateKey)) {
            $privateKey = PrivateKeyManipulator::importPrivateKey($privateKey);
        }


        // Convert hex data to buffer
        $data = Buffer::hex($hexDataToSign);

        $ecAdapter = Bitcoin::getEcAdapter();

        // Deterministic digital signature generation
        $k = new Rfc6979($ecAdapter, $privateKey, $data, 'sha256');

        $sig = $privateKey->sign($data, $k);

        // DEBUG
        //echo "hexDataToSign: <br/>";
        //var_dump($hexDataToSign);
        //echo "sig: <br/>";
        //var_dump($sig->getHex());

        return $sig->getHex();
    }
}
