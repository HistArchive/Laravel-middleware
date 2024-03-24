<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class logResponse
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);
        $infoLog = 'Method: ' . $request->method() . ', Response status code: ' . $response->status() . ', URL called: ' . $request->fullUrl();
        logger()->info($infoLog);
        return $response;
    }
}


