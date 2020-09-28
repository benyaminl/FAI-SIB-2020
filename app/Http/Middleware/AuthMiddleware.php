<?php

namespace App\Http\Middleware;

use Closure;

class AuthMiddleware
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
        if (!$request->session()->has("user")) {
            return \redirect("/login")
            ->with("error", "Anda harus login terlebih dahulu!");
        }

        return $next($request);
    }
}
