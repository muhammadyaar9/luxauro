<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string[]|null  ...$guards
     * @return mixed
     */
    public function handle($request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;
        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                // return redirect(RouteServiceProvider::HOME);
                if (strpos(url()->previous(), 'goldEvines/founderRegister'))
                {
                    return redirect()->route('goldEvine');
                }
                if (strpos(url()->previous(), 'goldMetal/professionalRegister'))
                {
                    return redirect()->route('goldMetal');
                }
            }
         
        }

        return $next($request);
    }
}
