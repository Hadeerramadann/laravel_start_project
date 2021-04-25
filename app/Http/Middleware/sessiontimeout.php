<?php

namespace App\Http\Middleware;

use Closure;

class sessiontimeout
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // // ->hasRole($role)
        if (!$request->session()->has()) {
        //     // Redirect...
            return redirect('/sessionfinish');
            // abort(403);
        // return $next($request);

        }
        // return redirect('/new'.auth()->user()->name);

        return $next($request);

    }

}
?>