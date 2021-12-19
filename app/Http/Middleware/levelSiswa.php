<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class levelSiswa
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->level !== 'siswa') {
            abort(403);
        }
        return $next($request);
    }
}
