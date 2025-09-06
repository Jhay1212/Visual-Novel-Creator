<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAuthor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();
        $game = $request->route("game");
        // echo(`<script>alert(${game})</alert>`);
        if ($user) {
            return $next($request);
        }
        abort(403, 'Unauthorized access to this game.');
    }
}
