<?php

namespace App\Http\Middleware;

use Closure;

class CheckAdmin
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
        // si l'utilisateur n'est pas logué ou qu'il n'est pas admin alors :
        if($request->user() == false || $request->user()->hasRole('Admin') == false){
            /* On le redirige vers la page home */
            return redirect(route('homepage'));
        }
        return $next($request);
    }
}
