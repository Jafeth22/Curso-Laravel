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
            ////Ways to redirect
            /**
             * •redirect('route of the view'); //Redirect a specific route
             * •redirect()->action(controllerName@methodName)->WithInput(); The WithInput is optional
             * •redirect()->route('RouteAlias');
             * •back(); Go back to the last route
             */
            return redirect('fruteria/peras');
        }
        return $next($request);
    }
}
