<?php

namespace App\Http\Middleware;

use Closure;

class CheckAuth
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
        if ($request->header('Auth-Token')){
//            todo auth-token的验证
            return $next($request);
        } else {
            return response()->json(['code' => 500, 'msg' => 'Auth-Token不能为空']);
        }
    }
}
