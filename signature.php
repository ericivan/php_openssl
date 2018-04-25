<?php

$data = 'my signature data';

/*密码*/
$passphrase = 'mysecret';

/*摘要生成算法*/
$digestAlgo = 'sha512';

/*签名算法*/
$algo = OPENSSL_ALGO_SHA1;

$privateKeyFile = './id_rsa';

/*生成私钥*/
$privateKey = openssl_pkey_get_private(file_get_contents($privateKeyFile),$passphrase);

/*生成摘要*/
if (function_exists("hash")) {
    $digest = hash($digestAlgo, $data, TRUE);
} elseif (function_exists("mhash")) {
    $digest = mhash(constant("MHASH_" . strtoupper($digestAlgo)), $data);
}

/*摘要*/
$digest = bin2hex($digest);

$signature = '';

/*签名生成*/
openssl_sign($digest, $signature,$privateKey,$algo);

$signature = base64_encode($signature);

var_dump($signature);

$publicKeyFile = './id_rsa.pub';

/*生成公钥*/
$publicKey = openssl_pkey_get_public(file_get_contents($publicKeyFile));


/*签名认证*/
$verify = openssl_verify($digest, base64_decode($signature), $publicKey, $algo);

/*输出1为签名成功*/
var_dump($verify);


