<?php

namespace App\Classes\BlockCypher\Crypto;
use BitWasp\Bitcoin\Crypto\EcAdapter\Key\PrivateKeyInterface;
use BitWasp\Bitcoin\Key\Factory\PrivateKeyFactory;


class PrivateKeyManipulator
{
    /**
     * @param string $plainPrivateKey
     * @return PrivateKeyInterface
     */
    public static function importPrivateKey($plainPrivateKey)
    {
        $privateKey = null;
        $extraMsg = '';

        // TODO: Code Review. Method to detect private key format.

        $privFactory = new PrivateKeyFactory(null);

        if ($privateKey === null) {
            try {
                $privateKey = $privFactory->fromWif($plainPrivateKey);
            } catch (\Exception $e) {
                $extraMsg .= " Error trying to import from Wif: " . $e->getMessage();
            }
        }

        if ($privateKey === null) {
            try {
                $privateKey = $privFactory->fromHexCompressed($plainPrivateKey);
            } catch (\Exception $e) {
                $extraMsg .= " Error trying to import from Hex: " . $e->getMessage();
            }
        }

        if ($privateKey === null) {
            throw new \InvalidArgumentException("Invalid private key format. " . $extraMsg);
        }

        return $privateKey;
    }

//    /**
//     * @param string $wifPrivateKey
//     * @param \BitWasp\Bitcoin\NetworkInterface|null $network
//     * @return PrivateKeyInterface
//     * @throws \Exception
//     */
//    public static function importPrivateKeyFromWif($wifPrivateKey, $network)
//    {
//        $privFactory = new PrivateKeyFactory(null);
//        $privateKey = $privFactory->fromWif($wifPrivateKey, $network);
//        return $privateKey;
//    }
//
//    /**
//     * @param string $hexPrivateKey
//     * @param bool $compressed
//     * @return string
//     */
//    public static function generateHexPubKeyFromHexPrivKey($hexPrivateKey, $compressed = true)
//    {
//        $privateKey = self::importPrivateKeyFromHex($hexPrivateKey, $compressed);
//        $hexPublicKey = $privateKey->getPublicKey()->getHex();
//        return $hexPublicKey;
//    }
//
//    /**
//     * @param string $hexPrivateKey
//     * @param bool $compressed
//     * @return PrivateKeyInterface
//     * @throws BlockCypherInvalidPrivateKeyException
//     */
//    public static function importPrivateKeyFromHex($hexPrivateKey, $compressed = true)
//    {
//        $privateKey = null;
//
//        try {
//            $privFactory = new PrivateKeyFactory(null);
//            if ($compressed)
//                $privateKey = $privFactory->fromHexCompressed($hexPrivateKey);
//            else
//                $privateKey = $privFactory->fromHexUncompressed($hexPrivateKey);
//        } catch (\Exception $e) {
//            throw new BlockCypherInvalidPrivateKeyException('Invalid private key format, hex expected.' . $e->getMessage());
//        }
//
//        return $privateKey;
//    }
//
//    /**
//     * @param PrivateKeyInterface $privateKey
//     * @param string $coinSymbol
//     * @return mixed
//     * @throws \Exception
//     */
//    public static function getAddressFromPrivateKey($privateKey, $coinSymbol)
//    {
//        CoinSymbolValidator::validate($coinSymbol, 'coinSymbol');
//
//        $network = CoinSymbolNetworkMapping::getNetwork($coinSymbol);
//
//        $publicKey = $privateKey->getPublicKey();
//        $pkph = new PayToPubKeyHashAddress($publicKey->getPubKeyHash());
//
//        $address = $pkph->getAddress($network);
//
//        return $address;
//    }
}
