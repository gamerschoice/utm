<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Domain;
use Filament\Notifications\Notification; 

class OwnedByTeam
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $domain = Domain::find($request->domain_id);
        if($domain->team->hasUser($request->user())) {
            return $next($request);
        }

        Notification::make() 
            ->title('Domain not found.')
            ->body("We we're unable to find the domain you requested.")
            ->warning()
            ->send(); 

        return redirect()->back();
    }
}
