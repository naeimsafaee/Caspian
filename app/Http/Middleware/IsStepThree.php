<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsStepThree {

    public function handle(Request $request, Closure $next) {

        if (auth()->guard('clients')->user()->level <= 2)
            return redirect()->route('verification')->with('warning', 'سطح کاربری شما کمتر از سه می باشد برای ادامه باید به سطح سه ارتقا پیدا کنید.');

        return $next($request);
    }

}

