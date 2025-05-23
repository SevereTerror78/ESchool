<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LanguageMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        
        dd($request->all());
        // Ellenőrizzük, hogy van-e 'locale' a session-ben
        if (session()->has('locale')) {
            app()->setLocale(session('locale'));
        } else {
            // Ha nincs, beállítunk alapértelmezett nyelvet (pl. angol)
            app()->setLocale('hu');
        }

        return $next($request);
    }
}
