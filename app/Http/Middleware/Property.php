<?php

namespace App\Http\Middleware;

use Closure;

class Property
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
        $uri = explode('/', $_SERVER['REQUEST_URI']);
        $nft_id = $uri[2];
        $nft = $request->user()->nfts()->where('id', $nft_id)->get();
        if (count($nft) == 0) {
            abort(403);
        }
        return $next($request);
    }
}
