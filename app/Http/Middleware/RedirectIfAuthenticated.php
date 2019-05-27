<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        // on redirige vers order/adress  (de base la redirection se fait sur home) si l'utilisateur est logué, ici check vérifie si l'utilisateur est logué
        if (Auth::guard($guard)->check()) {
            return redirect('/order/adress');
        }
        // sinon redirige vers la prochaine requête (en fonction de la page sur laquelle on est)
        return $next($request);
    }
}
