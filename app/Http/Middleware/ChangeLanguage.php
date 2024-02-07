<?php

namespace App\Http\Middleware;

use Closure;

class ChangeLanguage
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
        app()->setLocale('ar');
        $lang= $request->header('lang') ;
        if(isset($lang)  && $lang == 'en' )
        // if(isset($request -> lang)  && $request -> lang == 'en' )
            app()->setLocale('en');

        return $next($request);
    }
}
