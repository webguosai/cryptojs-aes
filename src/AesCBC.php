<?php
namespace Webguosai;

class AesCBC
{
    /**
     * AES加密
     */
    public static function encrypt($array = [], $key = '', $iv = '', $method = 'AES-128-CBC')//AES-256-CBC
    {
        $plaintext = json_encode($array, JSON_UNESCAPED_UNICODE);
        $str       = openssl_encrypt($plaintext, $method, $key, 0, $iv);

        return bin2hex(base64_decode($str));
    }

    /**
     * AES解密
     */
    public static function decrypt($encrypt = '', $key = '', $iv = '', $method = 'AES-128-CBC')//AES-256-CBC
    {
        $encrypt = base64_encode(hex2bin($encrypt));

        $str = openssl_decrypt($encrypt, $method, $key, OPENSSL_ZERO_PADDING, $iv);
        $str = substr($str, 0, strrpos($str, "}") + 1);

        $encode = json_decode($str, true);
        return $encode;
    }

}