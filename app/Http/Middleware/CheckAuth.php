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
        if (in_array($request->path(), config('auth.ignore'))){
            return $next($request);
        }
        if ($request->header('Auth-Token')){
//            todo auth-token的验证
        } else {
            return response()->json(['code' => 500, 'msg' => 'Auth-Token不能为空']);
        }
    }
}
