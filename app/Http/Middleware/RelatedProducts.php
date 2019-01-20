<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\View;
//use Illuminate\View\View;

class RelatedProducts
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
        //dump($request->route()->parameters());
        $category = $request->product->category;
        $products = $category->products()->related($request->product->id)->get();
        View::share('related', $products);
        return $next($request); 
    }
}
