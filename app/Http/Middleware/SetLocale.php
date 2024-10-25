<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (session()->has('locale') && in_array(session('locale'), config('app.supported_locales'))) {
            app()->setLocale(session('locale'));
        } else {
            session()->put('locale', 'ru');
            app()->setLocale('ru');
        }
        return $next($request);
    }
}
