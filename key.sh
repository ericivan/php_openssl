#生成简单秘钥
openssl genrsa -out private.pem 1024

#利用秘钥生成公钥
openssl rsa -in private.pem pubout -out public.key



#私钥指定加密算法,密码
openssl genrsa -aes128 -passout pass:mysecret -out private.pem 2048

#生成公钥
openssl rsa -in private.pem -passin pass:mysecret -pubout -out public.pub


