<?php

namespace App\Http\Controllers;

use App\Models\Bid;
use App\Models\ClientCoin;
use App\Models\Coin;
use App\Models\Currency;
use App\Models\DepositCach;
use App\Models\Offer;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller {

    public function __invoke(Request $request) {

        $client = auth()->guard('clients')->user();

        $all_coin = Coin::all();

        foreach($all_coin as $coin) {
            ClientCoin::query()->where([
                'client_id' => $client->id,
                'coin_id' => $coin->id,
            ])->firstOrCreate([
                'client_id' => $client->id,
                'coin_id' => $coin->id,
            ]);
        }

        $client_coins = $client->coins->sortByDesc('value')->values();
        /*
                $last_4_coin = ClientCoin::query()
                    ->where('client_id' , $client->id )
                    ->where('amount' , '!=' , 0)
                    ->get()->sortByDesc('toman_value');*/

        $last_4_coin = ClientCoin::query()->whereHas('coin', function(Builder $query) {
            $query->where('is_special', true);
        })->where('client_id', $client->id)
            ->where('amount', '!=', 0)
            ->get()->sortByDesc('toman_value');

        $tether = Currency::query()->where('symbol', 'usdt')->firstOrFail();

        $bid_amount = Bid::query()->where([
                'client_id' => $client->id,
                'status' => 'active'
            ])->selectRaw('SUM(amount * price) as t_a')->get()->first()->t_a ?? 0;

        $offer_amount = Offer::query()->where([
                'client_id' => $client->id,
                'status' => 'active'
            ])->selectRaw('SUM(amount * price) as t_a')->get()->first()->t_a ?? 0;

        $showWelcome = DepositCach::query()->where([
                'client_id' => auth()->guard('clients')->user()->id,
                'is_paid' => true
            ])->count() == 0;

        return view('dashboard.main', compact('client', 'client_coins'
            , 'last_4_coin', 'bid_amount', 'offer_amount', 'showWelcome'));
    }

    public function wallet_transactions_show(Request $request) {
        return view('dashboard.wallet.transactions');
    }

    public function sum_btc($view) {
        return;
        /*$client = auth()->guard('clients')->user();

        $btc_value = ClientCoin::query()->where('client_id', $client->id)->get()->sum('btc_value');
        $bitcoin = Coin::query()->where('symbol', 'btc')->firstOrFail();

        $view->with('btc_value', $btc_value)->with('bitcoin', $bitcoin);*/
    }

}
