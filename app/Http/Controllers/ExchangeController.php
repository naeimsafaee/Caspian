<?php

namespace App\Http\Controllers;

use App\Http\Requests\BuySwapRequest;
use App\Models\ClientCoin;
use App\Models\Coin;
use App\Models\Currency;
use App\Models\FavoriteCoin;
use App\Models\SwapHistory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class ExchangeController extends Controller {

    public function exchange_show() {

        $client = auth()->guard('clients')->user();

        if (\request()->search) {
            $fav_coins = Coin::query()
                ->whereHas('favorite', function(Builder $query) use ($client) {
                    $query->where('client_id', $client->id);
                })
                ->where(function($query) {
                    $query->orWhere('name', 'LIKE', "%" . \request()->search . "%")
                        ->orWhere('persian_name', 'LIKE', "%" . \request()->search . "%")
                        ->orWhere('symbol', 'LIKE', "%" . \request()->search . "%");
                })
                ->get();

            $coins = Coin::query()
                ->where(function($query) {
                    $query->orWhere('name', 'LIKE', "%" . \request()->search . "%")
                        ->orWhere('persian_name', 'LIKE', "%" . \request()->search . "%")
                        ->orWhere('symbol', 'LIKE', "%" . \request()->search . "%");
                })
                ->where('symbol', '!=', 'usdt')
                ->orderByDesc('volume')
                ->get();

        } else {
            $fav_coins = Coin::query()->whereHas('favorite', function(Builder $query) use ($client) {
                $query->where('client_id', $client->id);
            })->get();
            $coins = Coin::query()->orderByDesc('volume')->where('symbol', '!=', 'usdt')->get();

        }

        $tether = Currency::query()->findOrFail(setting('static.tether'));
        $tether_coin = Coin::query()->where('symbol', 'usdt')->firstOrFail();

        return view('dashboard.exchange.index', compact('coins', 'tether', 'fav_coins', 'tether_coin'));
    }

    public function swap_show($_coin, $_vs_coin) {

        $coin = Coin::query()->where('name', $_coin)->first();
        $vs_coin = Coin::query()->where('name', $_vs_coin)->first();

        if (!$coin) {
            $coin = Currency::query()->where('name', $_coin)->first();
            $client_wallet = auth()->guard('clients')->user()->wallet;
        } else {
            $client_wallet = auth()->guard('clients')->user()->coin($coin->id);
        }

        if (!$vs_coin) {
            $vs_coin = Currency::query()->where('name', $_vs_coin)->first();
        }

        $toman = Currency::query()->findOrFail(setting('static.toman'));
        $tether = Currency::query()->findOrFail(setting('static.tether'));

        if (/*strtolower($vs_coin->symbol) == 'usdt' || */ strtolower($vs_coin->symbol) == 'tmn')
            $rate = $coin->price * $vs_coin->price;
        /* elseif(strtolower($coin->symbol) == 'tmn' && strtolower($vs_coin->symbol) == 'usdt')
             $rate = $coin->price * $vs_coin->price;*/
        elseif (strtolower($coin->symbol) == 'tmn')
            $rate = 1 / ($tether->price * $vs_coin->price);
        else
            $rate = $coin->price / $vs_coin->price;

        $all_currency = Currency::all();
        $all_coin = Coin::all();

        return view('dashboard.exchange.swap', compact('coin', 'vs_coin',
            'all_coin', 'all_currency', 'toman', 'client_wallet', 'rate'));
    }

    public function submit_swap(BuySwapRequest $request) {

        $coin = Coin::query()->where('symbol', $request->coin)->first();
        $vs_coin = Coin::query()->where('symbol', $request->vs_coin)->first();

        $client = auth()->guard('clients')->user();

        if (!$coin) {
            $coin = Currency::query()->where('symbol', $request->coin)->first();
            $client_wallet = $client->wallet;
        } else {
            $client_wallet = $client->coin($coin->id);
        }

        if (!$vs_coin) {
            $vs_coin = Currency::query()->where('symbol', $request->vs_coin)->first();
        }

        $tether = Currency::query()->findOrFail(setting('static.tether'));
        $toman = Currency::query()->findOrFail(setting('static.toman'));

        if (strtolower($vs_coin->symbol) == 'tmn')
            $rate = $coin->price * $vs_coin->price;
        elseif (strtolower($coin->symbol) == 'tmn'){
            $rate = 1 / ($tether->price * $vs_coin->price);
            $client_wallet -= (float) setting('static.swap_fee');
        }
        else
            $rate = $coin->price / $vs_coin->price;

        $requested_amount = ((float)str_replace(",", "", $request->amount));

        $amount = $requested_amount * $rate;

        if ($client_wallet <= $requested_amount)
            throw ValidationException::withMessages(['amount' => 'موجودی کیف پول شما کمتر از این مقدار است!']);

        if (strtolower($vs_coin->symbol) == 'tmn') {
            //sell coin with toman
            ClientCoin::query()->where([
                'client_id' => $client->id,
                'coin_id' => $coin->id,
            ])->update([
                'amount' => DB::raw("amount-$requested_amount")
            ]);

            $client->wallet += $amount;
            $client->save();

        } elseif (strtolower($coin->symbol) == 'tmn') {
            //buy coin with toman
            ClientCoin::query()->where([
                'client_id' => $client->id,
                'coin_id' => $vs_coin->id,
            ])->update([
                'amount' => DB::raw("amount+$amount")
            ]);

            $client->wallet -= $requested_amount;
            $client->save();

        } else {

            ClientCoin::query()->where([
                'client_id' => $client->id,
                'coin_id' => $coin->id,
            ])->update([
                'amount' => DB::raw("amount-$requested_amount")
            ]);

            ClientCoin::query()->where([
                'client_id' => $client->id,
                'coin_id' => $vs_coin->id,
            ])->update([
                'amount' => DB::raw("amount+$amount")
            ]);

        }

        $swap = SwapHistory::query()->create([
            'client_id' => auth()->guard('clients')->user()->id,
            'coin' => $coin->symbol,
            'vs_coin' => $vs_coin->symbol,
            'coin_amount' => $requested_amount,
            'vs_coin_amount' => $amount,
        ]);

        return redirect()->route('swap_result', $swap->id);
    }

    public function result_swap($swap_id) {

        $swap = SwapHistory::query()->findOrFail($swap_id);

        $coin = Coin::query()->where('symbol', $swap->coin)->first();
        $vs_coin = Coin::query()->where('symbol', $swap->vs_coin)->first();

        if (!$coin)
            $coin = Currency::query()->where('symbol', $swap->coin)->firstOrFail();

        if (!$vs_coin)
            $vs_coin = Currency::query()->where('symbol', $swap->vs_coin)->firstOrFail();

        return view('dashboard.exchange.swap_result', compact('swap', 'coin', 'vs_coin'));
    }

    public function sell_show(Request $request) {
        return view('dashboard.exchange.sell');
    }

    public function result_show(Request $request) {
        return view('dashboard.exchange.result');
    }

}
