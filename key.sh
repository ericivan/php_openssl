#生成简单秘钥
openssl genrsa -out id_rsa 1024

#利用秘钥生成公钥
openssl rsa -in id_rsa -pubout -out id_rsa.pub



#私钥指定加密算法,密码
openssl genrsa -aes128 -passout pass:mysecret -out id_rsa 2048

#生成公钥
openssl rsa -in id_rsa -passin pass:mysecret -pubout -out id_rsa.pub

