<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Redis;
use Cache;
class CheckMessageInterval
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
        $ip = ip2long($request->ip());
        if(Cache::has($ip))
        {
            return redirect()->route('message.create')->withErrors('留言太频繁了，请稍后再试');
        }
        //Redis::setex($ip, 15, 1);
        Cache::put($ip, '1', 1); //两次留言间隔需要至少 1 分钟
        return $next($request);
    }
}
