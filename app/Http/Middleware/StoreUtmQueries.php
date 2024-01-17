<?php

namespace App\Http\Middleware;

use App\Events\UtmCampaignVisited;
use App\Models\UtmVisit;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StoreUtmQueries
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if($request->has('utm_campaign') && $request->has('utm_medium') && $request->has('utm_source')) {
            UtmCampaignVisited::dispatch(
                $request->get('utm_campaign'),
                $request->get('utm_medium'),
                $request->get('utm_source'),
                $request->ip(),
                $request->get('utm_term', null),
                $request->get('utm_content', null),
                $request->get('referer', null),
                auth()->id() ?? null,
            );
        }

        return $next($request);
    }
}
