<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsStepTwo {

    public function handle(Request $request, Closure $next) {

        if (auth()->guard('clients')->user()->level <= 1)
            return redirect()->route('verification')->with('warning', 'سطح کاربری شما کمتر از دو می باشد برای ادامه باید به سطح دو ارتقا پیدا کنید.');

        return $next($request);
    }

}

