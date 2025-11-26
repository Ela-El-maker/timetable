<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
{
    public function handle(Request $request, Closure $next): Response|RedirectResponse
    {
        if (! $request->user()) {
            return redirect()->route('login');
        }

        if ($request->user()->role !== 'user' || ! $request->user()->status) {
            abort(403);
        }

        return $next($request);
    }
}
