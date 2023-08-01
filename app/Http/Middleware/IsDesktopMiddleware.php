<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;

class IsDesktopMiddleware {

    public function handle(Request $request, Closure $next) {

        $agent = new Agent();

        if(!$agent->isDesktop()){
            session(['url.intended' => url()->current()]);
            return redirect()->route('desk_please');
        }

        return $next($request);
    }
}
