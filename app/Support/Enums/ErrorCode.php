<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/6/11
 * Time: 下午1:46
 */

namespace App\Support\Enums;


use xiaolin\Enum\Enum;

class ErrorCode extends Enum
{
    /**
     * @Message('系统错误')
     */
    public static $ENUM_SYSTEM_ERROR = 400;

    /**
     * @Message('CURL接口访问失败')
     */
    public static $ENUM_SYSTEM_CURL_ERROR = 401;

    /**
     * @Message('API 配置不存在')
     */
    public static $ENUM_SYSTEM_API_CONFIG_NOT_EXIST = 402;

    /*
     * @Message('API请求参数非法')
     */
    public static $ENUM_SYSTEM_API_REQUEST_ILLEGAL = 403;

    /**
     * @Message('参数错误')
     */
    public static $ENUM_SYSTEM_API_PARAM_ERROR = 1000;
}