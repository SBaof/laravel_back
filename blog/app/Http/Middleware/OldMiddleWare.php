<?php

namespace App\Http\Middleware;

use Closure;

class OldMiddleWare
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if ($request->input('age') <= 200) {
            return redirect('/');
        }
        return $next($request);
    }
}
