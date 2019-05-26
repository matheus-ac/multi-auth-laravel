<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;


class AuthSubadmin
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
        Auth::shouldUse('subadmin');

        if (Auth::guest()) {

            return redirect()->route('auth.login')->withErrors(['field' => 'Área de acesso restrito. Faça seu login!']);
        }
        return $next($request);
    }
}
