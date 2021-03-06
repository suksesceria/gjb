<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Facades\Auth;

class AccessRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     * @throws AuthorizationException
     */
    public function handle($request, Closure $next)
    {
        $menu = Auth::user()->role->menus()->where('menu_code', $request->route()->getName())->first();
        if (! $menu)
            throw new AuthorizationException();
        return $next($request);
    }
}
