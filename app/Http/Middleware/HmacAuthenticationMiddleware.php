<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HmacAuthenticationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $sharedSecret = config('hmac.secrets');

        $providedSignature = $request->header('X-Signature');
        $timestamp = $request->header('X-Timestamp');

        if (!$providedSignature || !$timestamp) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        if (abs(time() - (int)$timestamp) > 300) {
            return response()->json(['error' => 'Request expired'], 401);
        }

        $body = $request->getContent();
        $computedSignature = hash_hmac('sha256', $timestamp . $body, $sharedSecret);

        if (!hash_equals($computedSignature, $providedSignature)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $next($request);
    }
}
