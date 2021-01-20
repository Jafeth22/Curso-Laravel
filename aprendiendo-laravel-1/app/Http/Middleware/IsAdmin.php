<?php

namespace App\Http\Middleware;

use Closure;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next ///Go to the next request
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //Cheks the param's value
        if (is_null($request->route('admin'))){
            return redirect('fruteria/peras');
        }
        return $next($request);
    }
}
