<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/5/27
 * Time: 下午12:41
 */

namespace App\Http\Middleware;

use Closure;


class ApiSignVerify
{
    public $router = [
//        "api/user/info"
    ];

    public function handle($request, Closure $next)
    {
        if (in_array($request->route()->uri(), $this->router)) {

        }
        return $next($request);
    }
}