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
}