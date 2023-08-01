<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthMiddleware {

    public function handle(Request $request, Closure $next) {

        if (auth()->guard('clients')->check()) {
            return redirect()->route('profile_info');
        } else
            return $next($request);

    }
}
