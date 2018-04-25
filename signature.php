<?php

$data = 'my signature data';

$passphrase = '';

$digestAlgo = 'sha512';

$algo = OPENSSL_ALGO_SHA1;

$privateKeyFile = './id_rsa';

$privateKey = openssl_pkey_get_private(file_get_contents($privateKeyFile));

if (function_exists("hash")) {
    $digest = hash($digestAlgo, $data, TRUE);
} elseif (function_exists("mhash")) {
    $digest = mhash(constant("MHASH_" . strtoupper($digestAlgo)), $data);
}

/*摘要*/
$digest = bin2hex($digest);

$signature = '';

openssl_sign($digest, $signature,$privateKey,$algo);

$signature = base64_encode($signature);

var_dump($signature);

$publicKeyFile = './id_rsa.pub';

$publicKey = openssl_pkey_get_public(file_get_contents($publicKeyFile));

$verify = openssl_verify($digest, base64_decode($signature), $publicKey, $algo);

var_dump($verify);


