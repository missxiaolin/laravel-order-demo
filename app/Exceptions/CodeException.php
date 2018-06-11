<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/6/11
 * Time: 下午1:45
 */

namespace App\Exceptions;

use App\Support\Enums\ErrorCode;
use Exception;
use Throwable;

class CodeException extends Exception
{
    public function __construct($code = 0, $message = null, Throwable $previous = null)
    {
        if ($message === null) {
            $message = ErrorCode::getMessage($code);
        }
        parent::__construct($message, $code, $previous);
    }
}