<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Get the authenticated user
        $user = $request->user();

        // If user is admin or super admin, allow them to access the page
        if ($user->isAdmin())
            return $next($request);

        // If user is not an admin, check if they have the required role
        if ($user->hasRoles($roles))
            return $next($request);

        // dd($roles);
        // If user is not an admin and does not have the required role, redirect to 403 page
        return abort(403);
    }
}
