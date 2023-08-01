<?php

namespace App\Http\Controllers;

use App\Http\Requests\CopyTradeRequestRequest;
use App\Models\Bid;
use App\Models\ClientToTrader;
use App\Models\FollowTrader;
use App\Models\Offer;
use App\Models\Risk;
use App\Models\Trader;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CopyTradeController extends Controller {

    public function list_show() {

        $most_copied_traders = collect();
        $newest_traders = collect();
        $followed_traders = collect();
        $client_copies_traders = collect();

        if (\request()->has('sort')) {

            if (\request()->sort === 'most_copied')
                $most_copied_traders = Trader::query()->where('status', 'accepted')->orderByDesc('copied_count')->get();

            if (\request()->sort === 'newest')
                $newest_traders = Trader::query()->where('status', 'accepted')->orderByDesc('created_at')->get();

            if (\request()->sort === 'followed')
                $followed_traders = Trader::query()->whereHas('follow', function(Builder $query) {
                    $query->where('client_id', '=', auth()->guard('clients')->user()->id);
                })->where('status', 'accepted')->orderByDesc('created_at')->get();

            if (\request()->sort === 'yours')
                $client_copies_traders = Trader::query()->whereHas('copies', function(Builder $query) {
                    $query->where('client_id', '=', auth()->guard('clients')->user()->id);
                })->where('status', 'accepted')->orderByDesc('created_at')->get();

        } else {

            $most_copied_traders = Trader::query()->where('status', 'accepted')->orderByDesc('copied_count')->take(3)->get();
            $newest_traders = Trader::query()->where('status', 'accepted')->orderByDesc('created_at')->take(3)->get();

            $followed_traders = Trader::query()->whereHas('follow', function(Builder $query) {
                $query->where('client_id', '=', auth()->guard('clients')->user()->id);
            })->where('status', 'accepted')->orderByDesc('created_at')->take(3)->get();

            $client_copies_traders = Trader::query()->whereHas('copies', function(Builder $query) {
                $query->where('client_id', '=', auth()->guard('clients')->user()->id);
            })->where('status', 'accepted')->orderByDesc('created_at')->take(3)->get();
        }

        return view('dashboard.copytrade.list', compact('most_copied_traders',
            'newest_traders', 'followed_traders', 'client_copies_traders'));
    }

    public function single_trader_show($id) {

        $trader = Trader::query()->findOrFail($id);
        $is_self = false;
        if (auth()->guard('clients')->user()->id === $trader->client_id)
            $is_self = true;

        $bid = Bid::query()->where('client_id', $trader->client_id)->where('status', 'filled')->get();
        $offer = Offer::query()->where('client_id', $trader->client_id)->where('status', 'filled')->get();

        $positions = $bid->toBase()->merge($offer);

        $risks = [];

        for($i = 1; $i < 13; $i++) {
            $risks[] = Risk::query()->where([
                'trader_id' => $trader->id
            ])->whereMonth('created_at', $i)->sum('risk');
        }

        $copiers = ClientToTrader::query()->where(
            'trader_id' , $trader->id
        );

        $last_month_copiers_count = $copiers->where('created_at' , '>=' , Carbon::now()->subMonth())->count();
        $last_last_month_copiers_count = $copiers->where('created_at' , '>=' , Carbon::now()->subMonths(2))->where('created_at' , '<=' , Carbon::now()->subMonth())->count();

        $increase_count = $last_month_copiers_count - $last_last_month_copiers_count;

        $increase_percent = ($increase_count) / ($last_last_month_copiers_count !== 0 ? $last_last_month_copiers_count : 1) * 100;

        return view('dashboard.copytrade.profile', compact('is_self',
            'trader', 'positions' , 'risks' , 'copiers' ,
            'last_month_copiers_count' , 'increase_count' , 'increase_percent'));
    }

    public function request_show() {
        return view('dashboard.copytrade.request');
    }

    public function request_submit(CopyTradeRequestRequest $request) {

        $client = auth()->guard('clients')->user();

        $type = $request->copy_trade_type;
        $pay_value = 0;

        if ($type == 0) {
            $pay_value = $request->first_price;
            $type = 'first_pay';
        } elseif ($type == 1) {
            $type = 'darsad';
            $pay_value = $request->second_price;
        } else
            $type = 'free';

        Trader::query()->create([
            'client_id' => $client->id,
            'username' => $request->username,
            'pay_type' => $type,
            'paid_value' => setting('static.copytrade_fee'),
            'pay_value' => $pay_value,
        ]);

        $client->wallet -= setting('static.copytrade_fee');
        $client->save();

        return redirect()->route('dashboard')->with('success', 'درخواست تریدر شدن شما با موفقیت ثبت شد.');
    }

    public function follow_trader(Request $request) {

        $trader = Trader::query()->findOrFail($request->trader_id);

        $has_followed = FollowTrader::query()->where([
            'client_id' => auth()->guard('clients')->user()->id,
            'trader_id' => $trader->id
        ]);

        if ($has_followed->count() > 0) {
            $has_followed->first()->delete();
        } else {
            FollowTrader::query()->create([
                'client_id' => auth()->guard('clients')->user()->id,
                'trader_id' => $trader->id
            ]);
        }

        return response()->json(['message' => "ok"]);
    }

    public function copy_from_trader(Request $request) {

        $trader = Trader::query()->findOrFail($request->trader_id);
        $client = auth()->guard('clients')->user();

        if ($trader->pay_type == 'first_pay') {
            if ($client->wallet <= $trader->pay_value)
                throw ValidationException::withMessages(['wallet' => 'لطفا حساب خود را شارژ کنید.']);

            $client->wallet -= $trader->pay_value;
            $client->save();

            $trader_client = $trader->client;
            $trader_client->wallet += $trader->pay_value;
            $trader_client->save();
        }

        ClientToTrader::query()->updateOrCreate([
            'trader_id' => $trader->id,
            'client_id' => $client->id,
        ]);

        return response()->json(['message' => "ok"]);
    }

}
