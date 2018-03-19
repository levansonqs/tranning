<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class ManagerMiddelware
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
       $arUser = Auth::user();
       $level = (string)$arUser->level;
       if($level == 3){
        return redirect('noaccess');
    }
    return $next($request);
}
}
