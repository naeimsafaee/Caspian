<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ClientLoginMiddleware {

    public function handle(Request $request, Closure $next) {

        if (auth()->guard('clients')->check()) {
            return $next($request);
        } else {
            session(['url.intended' => url()->current()]);
            if(url()->current() == route('home'))
                session(['url.intended' => route('dashboard')]);

            return redirect()->route('login');
        }
    }
}
