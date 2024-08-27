<?php

namespace Webguosai;

class Aes
{
    const CBC_128 = 'AES-128-CBC';
    const CBC_192 = 'AES-192-CBC';
    const CBC_256 = 'AES-256-CBC';

    /**
     * AES加密
     * @param mixed $data 要加密的内容
     * @param string $key key长度根据加密模式不同，对照(128=16位,192=24位,256=32位)，前端已经做了处理，这里可以忽略长度限制
     * @param string $iv 固定16长度字符串
     * @param string $method AES-128-CBC AES-192-CBC AES-256-CBC
     * @return string
     */
    public static function encrypt($data, $key, $iv, $method = self::CBC_128)
    {
        $plaintext = json_encode($data, JSON_UNESCAPED_UNICODE);

        $str = openssl_encrypt($plaintext, $method, $key, 0, $iv);

        return bin2hex(base64_decode($str));
    }

    /**
     * AES解密
     * @param string $encrypt 要解密的内容
     * @param string $key key长度根据加密模式不同，对照(128=16位,192=24位,256=32位)，前端已经做了处理，这里可以忽略长度限制
     * @param string $iv 固定16长度字符串
     * @param string $method AES-128-CBC AES-192-CBC AES-256-CBC
     * @return mixed
     */
    public static function decrypt($encrypt, $key, $iv, $method = self::CBC_128)
    {
        $encrypt = base64_encode(hex2bin($encrypt));

        $str = openssl_decrypt($encrypt, $method, $key, 0, $iv);

        return json_decode($str, true);
    }
}