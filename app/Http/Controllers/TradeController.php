<?php

namespace App\Http\Controllers;

use App\Http\Requests\BuyRequest;
use App\Models\Bid;
use App\Models\Change;
use App\Models\Coin;
use App\Models\Deposit;
use App\Models\Offer;
use App\Models\Order;
use App\Models\Pair;
use App\Models\SwapHistory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class TradeController extends Controller {

    public function trade_show(Request $request) {
        return view('dashboard.trade.index');
    }

    public function single_show($pair) {

        if (!str_contains($pair, '-'))
            return redirect()->route('trade_single', strtoupper($pair) . "-USDT");

        $pairs = explode('-', $pair);
        if (count($pairs) != 2)
            abort(500);

        $coins = [];
        foreach($pairs as $_pair)
            $coins[] = Coin::query()->where('symbol', strtolower($_pair))->firstOrFail();

        $pair_coin = Pair::query()->where('coin_id', $coins[0]->id)->where('vs_coin_id', $coins[1]->id)->firstOrFail();

        $is_internal = \request()->is_internal === true;

        $client = auth()->guard('clients')->user();

        $account_amount = $client->coin($coins[0]->id);
        $account_vs_amount = $client->coin($coins[1]->id);

        $client_bids = Bid::query()->where([
            'client_id' => $client->id,
        ])->get();

        $client_offers = Offer::query()->where([
            'client_id' => $client->id,
        ])->get();

        $positions = $client_bids->toBase()->merge($client_offers);
        $price = round($coins[0]->price / $coins[1]->price, 4);

        $low_price = $price - ($price * 4 / 100);
        $high_price = $price + ($price * 4 / 100);

        $bids = Bid::query()->where('price', '<=', $high_price)->where('price', '>=', $low_price)
            ->where([
                'pair_id' => $pair_coin->id,
                'status' => 'active'
            ])->orderByDesc('created_at')->take(50)->get()->sortByDesc('price');

        $offers = Offer::query()->where('price', '<=', $high_price)->where('price', '>=', $low_price)
            ->where([
                'pair_id' => $pair_coin->id,
                'status' => 'active'
            ])->orderByDesc('created_at')->take(50)->get()->sortByDesc('price');

        $biggest_bid = Bid::query()->whereDate('created_at', Carbon::today())->where([
            'pair_id' => $pair_coin->id,
            'status' => 'filled'
        ])->orderByDesc('amount')->take(10)->get();

        $biggest_offer = Offer::query()->whereDate('created_at', Carbon::today())->where([
            'pair_id' => $pair_coin->id,
            'status' => 'filled'
        ])->orderByDesc('amount')->take(10)->get();

        $biggest = $biggest_bid->toBase()->merge($biggest_offer)/*->sortByDesc('amount')*/;

        $today_changes = Change::query()->where('pair_id', $pair_coin->id)
            ->whereDate('created_at', Carbon::today());

        if ($today_changes->count() > 0) {
            $today_high = Change::query()->where('pair_id', $pair_coin->id)
                ->whereDate('created_at', Carbon::today())
                ->orderByDesc('price')->first()->price;

            $today_low = Change::query()->where('pair_id', $pair_coin->id)
                ->whereDate('created_at', Carbon::today())
                ->orderBy('price')->first()->price;

            $today_average = ($today_high + $today_low) / 2;

            $today_start = Change::query()->where('pair_id', $pair_coin->id)
                ->whereDate('created_at', Carbon::today())
                ->orderBy('created_at')->first()->price;

            $today_end = Change::query()->where('pair_id', $pair_coin->id)
                ->whereDate('created_at', Carbon::today())
                ->orderByDesc('created_at')->first()->price;

            $today_change_percent = ($today_end - $today_start) / $today_start * 100;

        } else {
            $today_high = $price;
            $today_low = $price;
            $today_average = $price;
            $today_change_percent = 0;
        }

        $histories = Deposit::query()->where([
            'client_id' => $client->id,
            'coin_id' => $coins[0]->id
        ])->get();

        $swap_history = SwapHistory::query()->where('client_id', $client->id)->get();

        return view('dashboard.trade.trade',
            compact('pair', 'coins', 'is_internal',
                'account_vs_amount', 'account_amount', 'positions', 'price', 'offers',
                'bids', 'pair_coin', 'today_high', 'today_low', 'today_average', 'today_change_percent'
                , 'swap_history', 'biggest', 'histories'));
    }

    public function get_coin(Request $request) {
        $pair = $request->pair;
        if (!str_contains($pair, '-'))
            abort(400);

        $pairs = explode('-', $pair);
        $coins = [];
        foreach($pairs as $_pair)
            $coins[] = Coin::query()->where('symbol', strtolower($_pair))->firstOrFail();

        $pair_coin = Pair::query()->where('coin_id', $coins[0]->id)->where('vs_coin_id', $coins[1]->id)->firstOrFail();

        $is_internal = \request()->is_internal === true;

        $client = auth()->guard('clients')->user();

        $account_amount = $client->coin($coins[0]->id);
        $account_vs_amount = $client->coin($coins[1]->id);

        $price = round($coins[0]->price / $coins[1]->price, 4);

        $low_price = $price - ($price * 5 / 100);
        $high_price = $price + ($price * 5 / 100);

        $bids = Bid::query()->where('price', '<=', $high_price)->where('price', '>=', $low_price)
            ->where([
                'pair_id' => $pair_coin->id,
                'status' => 'active'
            ])->orderByDesc('created_at')->get();

        $offers = Offer::query()->where('price', '<=', $high_price)->where('price', '>=', $low_price)
            ->where([
                'pair_id' => $pair_coin->id,
                'status' => 'active'
            ])->orderByDesc('created_at')->get();

        return response()->json(compact('pair', 'coins', 'is_internal',
            'account_vs_amount', 'account_amount', 'bids', 'offers'));
    }

    public function place_buy(BuyRequest $request) {

        $client = auth()->guard('clients')->user();

        $client_coin_amount = $client->coin($request->coin_id);
        $client_vs_coin_amount = $client->coin($request->vs_coin_id);
        $amount = $request->amount;
        $price = (float)$request->price;

        if (strpos($amount, "%")) {
            $amount = (float)str_replace("%", "", $amount);
            $amount = $client_vs_coin_amount * $amount / 100;
            $amount = $amount / $price;
        }

        if ($client_vs_coin_amount <= ($price * (float)$amount))
            throw ValidationException::withMessages(['amount' => 'شما نمیتوانید این مقدار را خریداری کنید']);

        $pair = Pair::query()->where([
            'coin_id' => $request->coin_id,
            'vs_coin_id' => $request->vs_coin_id,
        ])->firstOrFail();

        $bid = Bid::query()->create([
            'client_id' => $client->id,
            'pair_id' => $pair->id,
            'amount' => $amount,
            'price' => $price,
            'status' => 'active',
            'profit_price' => $request->profit_price ?? '',
            'loss_price' => $request->loss_price ?? ''
        ]);

        if ($client->is_trader) {
            $copiers = $client->copiers;

            foreach($copiers as $copier) {

                $copier_coin_amount = $copier->coin($request->coin_id);
                $copier_vs_coin_amount = $copier->coin($request->vs_coin_id);

                $amount = $request->amount;
                $price = (float)$request->price;

                if (strpos($amount, "%")) {
                    $amount = (float)str_replace("%", "", $amount);
                    $amount = $copier_vs_coin_amount * $amount / 100;
                    $amount = $amount / $price;
                }

                if ($copier_vs_coin_amount <= ($price * (float)$amount))
                    continue;

                Bid::query()->create([
                    'client_id' => $copier->id,
                    'pair_id' => $pair->id,
                    'amount' => $amount,
                    'price' => $price,
                    'status' => 'active',
                    'profit_price' => $request->profit_price ?? '',
                    'loss_price' => $request->loss_price ?? ''
                ]);

            }
        }

        $bid = Bid::query()->with('pair', 'pair.coin', 'pair.vs_coin')->find($bid->id);

        return response()->json($bid);
    }

    public function place_sell(BuyRequest $request) {

        $client = auth()->guard('clients')->user();

        $client_coin_amount = $client->coin($request->coin_id);
        $client_vs_coin_amount = $client->coin($request->vs_coin_id);
        $amount = $request->amount;
        $price = (float)$request->price;

        if (strpos($amount, "%")) {
            $amount = (float)str_replace("%", "", $amount);
            $amount = $client_coin_amount * $amount / 100;
        }

        if ($client_coin_amount <= (float)$amount)
            throw ValidationException::withMessages(['amount' => 'شما نمیتوانید این مقدار را بفروشید']);

        $pair = Pair::query()->where([
            'coin_id' => $request->coin_id,
            'vs_coin_id' => $request->vs_coin_id,
        ])->firstOrFail();

        $offer = Offer::query()->create([
            'client_id' => $client->id,
            'pair_id' => $pair->id,
            'amount' => $amount,
            'price' => $price,
            'status' => 'active',
            'profit_price' => $request->profit_price ?? '',
            'loss_price' => $request->loss_price ?? ''
        ]);

        if ($client->is_trader) {
            $copiers = $client->copiers;

            foreach($copiers as $copier) {

                $copier_coin_amount = $copier->coin($request->coin_id);
                $copier_vs_coin_amount = $copier->coin($request->vs_coin_id);

                $amount = $request->amount;
                $price = (float)$request->price;

                if (strpos($amount, "%")) {
                    $amount = (float)str_replace("%", "", $amount);
                    $amount = $copier_coin_amount * $amount / 100;
                }

                if ($copier_coin_amount <= (float)$amount)
                    continue;

                Offer::query()->create([
                    'client_id' => $copier->id,
                    'pair_id' => $pair->id,
                    'amount' => $amount,
                    'price' => $price,
                    'status' => 'active',
                    'profit_price' => $request->profit_price ?? '',
                    'loss_price' => $request->loss_price ?? ''
                ]);

            }
        }

        $offer = Offer::query()->with('pair', 'pair.coin', 'pair.vs_coin')->find($offer->id);

        return response()->json($offer);
    }

}
