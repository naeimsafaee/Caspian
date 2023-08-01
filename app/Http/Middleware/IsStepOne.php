<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsStepOne {

    public function handle(Request $request, Closure $next) {

        if (auth()->guard('clients')->user()->level == 0)
            return redirect()->route('verification')->with('warning', 'سطح کاربری شما صفر می باشد لطفا ابتدا اطلاعات خود را تکمیل کنید.');

        return $next($request);
    }

}

