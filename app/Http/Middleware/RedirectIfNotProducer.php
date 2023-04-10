<?php

namespace App\Http\Middleware;

use App\Models\Producer;
use Closure;
use Illuminate\Http\Request;

class RedirectIfNotProducer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        /*
         * Si l'utilisateur n'est pas connecté, le `user` est `null` et ne connaît aucune propriété `tyupeable.
         * Le ? marque l'aspect optionnel de la propriété
         */
        if(!auth()->user()?->typeable instanceof Producer) {
            return redirect(route('login'));
        }
        return $next($request);
    }
}
