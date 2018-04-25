<?php

$data='my transformer data';

$publickeyFile="./id_rsa.pub";

/*生成公钥的key*/
$publicKey=openssl_pkey_get_public(file_get_contents($publickeyFile));

$encryptedData='';

/*加密数据*/
openssl_public_encrypt($data,$encryptedData,$publicKey);

$encryptedData=base64_encode($encryptedData);

var_dump($encryptedData);

$privateKeyFile='./id_rsa';

$passphrase = 'mysecret';

/*生成私钥,附带密码*/
$privateKey=openssl_pkey_get_private(file_get_contents($privateKeyFile),$passphrase);

$sensitiveData='';

/*利用私钥解密数据*/
openssl_private_decrypt(base64_decode($encryptedData),$sensitiveData,$privateKey);

var_dump($sensitiveData);

