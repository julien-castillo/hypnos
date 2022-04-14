<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Manager {
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next) {
        if ($request->user()->role === 'manager') {
            return $next($request);
        }
            return back( )->withErrors('Vous n\'êtes pas autorisé à consulter cette section' );
    }
}
