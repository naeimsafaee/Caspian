<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckCardAdded {

    public function handle(Request $request, Closure $next) {

        $clients = auth()->guard('clients')->user();
        $cards = $clients->card;

        if($cards->count() === 0)
            return redirect()->route('cards')->with('error' , 'شما هیچ کارتی ثبت نکرده اید. لطفا برای ادامه یکی از کارت های عضو شبکه شتاب خود را اضافه کنید.');

        $accepted_cards = $cards->where('status' , 'accepted');

        if($accepted_cards->count() == 0)
            return redirect()->route('cards')->with('error' , 'شما هیچ کارت تایید شده ای ندارید.لطفا یکی از کارت های عضو شبکه شتاب خود را اضافه کنید.');

        return $next($request);
    }
}
