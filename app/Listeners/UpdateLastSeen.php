<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Closure;
use Illuminate\Support\Facades\Auth;
class UpdateLastSeen
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            Auth::user()->update(['last_seen_at' => now()]);
        }

        return $next($request);
    }
}
