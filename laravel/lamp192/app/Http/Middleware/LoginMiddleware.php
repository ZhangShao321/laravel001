<?php

namespace App\Http\Middleware;

use Closure;

class LoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $ip = $request->ip();

        $str = '['.date('Y-m-d H:i:s',time()).']::ip地址'.$ip."\r\n";

        file_put_contents('UserLoginid.txt',$str,FILE_APPEND);

        return $next($request);
    }
}
