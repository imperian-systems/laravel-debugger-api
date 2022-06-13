<?php

namespace ImperianSystems\LaravelDebuggerApi\Middleware;

use Closure;
use Illuminate\Http\Request;

class LaravelDebugger 
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
        if(config('app.debug') == false)
        {
            return response()->json(["error"=>"Laravel Debugger is only available when APP_DEBUG is set to true. Check .env file."], 503);
        }

        $key = $request->header('X-Laravel-Debugger-Key');
        if(config('laravel-debugger.key') != $key)
        {
            return response()->json(["error"=>"Shared key doesn't match, check LARAVEL_DEBUGGER_KEY in .env."], 401);
        }

        return $next($request);
    }
}
