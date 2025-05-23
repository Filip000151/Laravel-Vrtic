<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UlogaMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$uloge): Response
    {
        if(!Auth::check()){
            return redirect('/login');
        }

        if(!in_array($request->user()->uloga, $uloge)){
            abort(403, 'Nemate dozvolu za pristup ovoj stranici.');
        }

        return $next($request);
    }
}
