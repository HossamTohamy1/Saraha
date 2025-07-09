<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Treits\HttpResponses;
class EmailIsVerified
{
    use HttpResponses;
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        
        if ($request->user() && !$request->user()->hasVerifiedEmail()) {
            return $this->Error('','Your email is not verified.', 403); 
        }

        return $next($request);
    }
}
