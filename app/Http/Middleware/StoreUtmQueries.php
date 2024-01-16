<?php

namespace App\Http\Middleware;

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
            UtmVisit::create([
                'utm_campaign' => $request->get('utm_campaign',),
                'utm_medium' => $request->get('utm_medium'),
                'utm_source' => $request->get('utm_source'),
                'utm_term' => $request->get('utm_term', null),
                'utm_content' => $request->get('utm_content', null),
                'referer' => $request->get('referer'),
                'user_ip_address' => $request->ip(),
                'user_id' => auth()->id() ?? null,
            ]);
        }

        return $next($request);
    }
}
