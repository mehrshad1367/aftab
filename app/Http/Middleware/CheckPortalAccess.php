<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckPortalAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $role = explode(".", $request->route()->getName());

        $user_role = Auth::user()->role->toArray();

        if ($role[0] != $user_role['title']){

            abort(404);
}

        return $next($request);
    }
}
