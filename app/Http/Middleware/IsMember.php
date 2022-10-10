<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use App\Policies\UserPolicy;
use Illuminate\Http\Request;

class IsMember
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard($guard)->user()->can(UserPolicy::MEMBER, User::class)) {
            return $next($request);
        }

        throw new HttpException(403, 'Forbidden');
    }
}
