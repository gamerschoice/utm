<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsOnTrial
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if($request->user()->currentTeam->onTrial())
        {
            return $next($request);
        }

        if($request->user()->ownsTeam($request->user()->currentTeam)) {
            return redirect('billing');
        }

        return route('dashboard');
    }
}
