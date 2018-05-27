<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/5/27
 * Time: 下午12:55
 */

namespace App\Support\Encrypt;


class Aes
{
    /**
     * 向量
     * @var string
     */
    const IV = "1234567890123412";// 16位

    /**
     * 默认秘钥
     * @var string
     */
    const KEY = '201707eggplant99';// 16位

    /**
     * 解密字符串
     * @param string $data 字符串
     * @param string $key 加密key
     * @return string
     */
    public static function decryptWithOpenssl($data, $key = self::KEY, $iv = self::IV)
    {
        return openssl_decrypt(base64_decode($data), "AES-128-CBC", $key, OPENSSL_RAW_DATA, $iv);
    }

    /**
     * 加密字符串
     * @param string $data 字符串
     * @param string $key 加密key
     * @return string
     */
    public static function encryptWithOpenssl($data, $key = self::KEY, $iv = self::IV)
    {
        return base64_encode(openssl_encrypt($data, "AES-128-CBC", $key, OPENSSL_RAW_DATA, $iv));
    }
}