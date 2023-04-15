<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsTeamOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //if(! $request->user()->ownsTeam($request->user()->currentTeam)) {
        if( ! $request->user()->hasTeamRole($request->user()->currentTeam, 'admin') ) {
            return redirect()->route('dashboard')->with([
                'flash.banner' => 'Unauthorized.',
                'flash.bannerStyle' => 'danger'
            ]);
        }

        return $next($request);
    }
}
