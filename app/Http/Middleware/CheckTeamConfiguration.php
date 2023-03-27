<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckTeamConfiguration
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(! $request->user()->currentTeam->domains() ) {
            \View::share('teamConfigured', false);
            \View::share('teamConfigError', 'no-url');
            \View::share('currentTeam', $request->user()->currentTeam);

            return $next($request);
        }

        \View::share('teamConfigured', true);
        \View::share('currentTeam', $request->user()->currentTeam);
        return $next($request);
    }
}
