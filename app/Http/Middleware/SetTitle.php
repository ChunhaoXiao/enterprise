<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\View;
class SetTitle
{
    /**
        设置页面标题
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $path = $request->path();
        $titles = config('menu.title');
        if(isset($titles[$path]))
        {
            $title = $titles[$path];
        }
        elseif(!empty($request->news))
        {
            $title = $request->news->title;
        }
        elseif(!empty($request->product))
        {
            $title = $request->product->name;
        }
        else
        {
            $title = '首页';
        }
        View::share('title', $title);
        return $next($request);
    }
}
