<?php

$data='my transformer data';

$publickeyFile="./id_rsa.pub";

$publicKey=openssl_pkey_get_public(file_get_contents($publickeyFile));

$encryptedData='';

openssl_public_encrypt($data,$encryptedData,$publicKey);

$encryptedData=base64_encode($encryptedData);

var_dump($encryptedData);

$privateKeyFile='./id_rsa';

$passphrase='';

$privateKey=openssl_pkey_get_private(file_get_contents($privateKeyFile));

$sensitiveData='';

openssl_private_decrypt(base64_decode($encryptedData),$sensitiveData,$privateKey);

var_dump($sensitiveData);

